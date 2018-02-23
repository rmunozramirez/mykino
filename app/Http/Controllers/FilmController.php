<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Film;
use App\Category;
use App\Language;
use App\Age;
use App\Fsk;
use Image;
use Session;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in the database
		
        //return a1l view and pass in the above variable.
        return view('films.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $languages = Language::all();
        $fsks = Fsk::all();
        return view ('films.create')->withCategories($categories)->withLanguages($languages)->withFsks($fsks);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'trailer' => 'required|max:255',
            'year' => 'required|max:255',
            'duration' => 'required|max:255',
            'slug'     => 'required|alpha_dash|min:2|max:255|unique:films,slug',
            'category_id'   => 'required|integer',
            'language_id'   => 'required|integer',
            'fsk_id'   => 'required|integer',
            'description' => 'required',
            'image' => 'sometimes|image'
        ));
        
        
        //store in the database
        $film = new Film;
        
        $film->name = $request->name;
        $film->trailer = $request->trailer;
        $film->slug = $request->slug;
        $film->year = $request->year;
        $film->category_id = $request->category_id;
        $film->duration = $request->duration;
        $film->language_id = $request->language_id;
        $film->fsk_id = $request->fsk_id;
        $film->description = $request->description;
        
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(300, 440)->save($location);

          $film->image = 'images/' . $filename;
        }
        
        $film->save();
        
        Session::flash('success', 'Film was succesfully saved');

        // redirect to another page
       return redirect()->route('films.show', $film->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $total = Film::all();
        
        $film = Film::orderBy('name', 'asc')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('films.*', 'languages.language', 'languages.image_language', 'categories.category', 'fsks.fsk', 'fsks.image_fsk', 'fsks.slug_fsk')
            ->where('films.slug', '=', $slug)->first();
        
        $category = DB::table('films')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->select('categories.slug_category')
            ->where('films.slug', '=', $slug)->first();
			
        $actor_in_film = DB::table('actors')
			->join('actor_film', 'actor_film.actor_id', '=', 'actors.id')
			->join('films', 'films.id', '=', 'actor_film.film_id')
			->join('categories', 'films.category_id', '=', 'categories.id')
            ->select('films.name as filmname', 'films.trailer', 'films.image as filmimage', 'films.slug as filmslug', 'categories.category', 'categories.slug_category' , 'actors.*')
            ->where('films.slug', "=", $slug)
			->get();
        
        $prev = $film->id - 1;
        $film_prev = DB::table('films')
                    ->select('films.*')
                    ->where('films.id', '=', $prev)->first();  

        $next = $film->id + 1;  
        $film_next = DB::table('films')
                    ->select('films.*')
                    ->where('films.id', '=', $next)->first();    

        return view('films.show')->withFilm($film)->withCategory($category)->withFilm_prev($film_prev)->withFilm_next($film_next)->withActor_in_film($actor_in_film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //find the film in the database
        $film = Film::find($slug); 
        
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->category;
        }

        $languages = Language::all();
        $langs = array();
        foreach ($languages as $language) {
            $lang[$language->id] = $language->language;
        }

        $fsks = fsk::all();
        $ages = array();
        foreach ($ages as $age) {
            $ages[$age->id] = $age->fsk;
        }
        
        //return a view and pass in the above variable.
        return view('films.edit')->withFilm($film)->withCats($cats)->withLangs($langs)->withAges($ages);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // Validate the data
        $film = Film::find($slug);

        if ($request->input('slug') == $film->slug) {
            $this->validate($request, array(
                'name' => 'required|max:255',
                'trailer' => 'required|max:255',
                'year' => 'required|max:255',
                'duration' => 'required|max:255',
                'category_id'   => 'required|integer',
                'language_id'   => 'required|integer',
                'fsk_id'   => 'required|integer',
                'description' => 'required',
                'image' => 'sometimes|image'
            ));
        } else {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'trailer' => 'required|max:255',
            'year' => 'required|max:255',
            'duration' => 'required|max:255',
            'slug'     => 'required|alpha_dash|min:5|max:255|unique:films,slug',
            'category_id'   => 'required|integer',
            'language_id'   => 'required|integer',
            'fsk_id'   => 'required|integer',
            'description' => 'required',
            'image' => 'sometimes|image'
            ));
        }

        // Save the data to the database
        $film = Film::find($slug);

        $film->name = $request->input('name');
        $film->trailer = $request->input('trailer');
        $film->year = $request->input('year');
        $film->duration = $request->input('duration');        
        $film->slug = $request->input('slug');
        $film->category_id = $request->input('category_id');
        $film->language_id = $request->input('language_id');
        $film->fsk_id = $request->input('fsk_id');
        $film->description = $request->input('description');

        $film->save();

        // set flash data with success message
        Session::flash('success', 'This post was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('films.show', $film->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($slug);
        $film->delete();

        Session::flash('success', 'The film was successfully deleted.');
        return redirect()->route('films.index');
    }

}
