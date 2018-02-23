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

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderBy = array('name', 'language', 'category', 'fsk', 'year', 'total');
        $order = 'name';
        if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
            $order = $_GET['orderBy'];
        }
        
        // create a variable and store all the blog posts in the database
        $films = DB::table('films')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('films.*', 'categories.category', 'fsks.fsk', 'fsks.image_fsk', 'fsks.slug_fsk','categories.slug_category', 'languages.language','languages.slug_language')
            ->orderBy($order, 'asc')
            ->paginate(20);
        
        $categories = DB::table('categories')
            ->orderBy('category', 'asc')
            ->get();

        $languages = DB::table('languages')
            ->orderBy('language', 'asc')
            ->get();
		
        $ages = DB::table('fsks')
            ->orderBy('fsk', 'asc')
            ->get();

        $total = Film::all();
		
        $languages1 = Language::all();
      
		$filmsxlanguage = DB::table('films')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->select('languages.language', 'languages.slug_language', DB::raw('count(*) as total'))
			->orderBy('language', 'asc')
			->groupBy('languages.language')
            ->get();
			
		$filmsxage = DB::table('films')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('fsks.image_fsk', 'fsks.slug_fsk', DB::raw('count(*) as total'))
			->orderBy('fsks.fsk')
			->groupBy('fsks.image_fsk')
            ->get();	
			
		$filmsxcategory = DB::table('films')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->select('categories.category', 'categories.slug_category', DB::raw('count(*) as total'))
			->orderBy('categories.category')
			->groupBy('categories.category')
            ->get();
			
		/* List of actors and total number of their films organized by number of films descendent and name ascendent*/
		
		$filmsxactor = DB::table('films')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
            ->select('films.id', 'actors.name', DB::raw('count(*) as total'))
			->orderBy('total', 'desc')
			->groupBy('actors.name')
			->get();

			
		/* List of actors and total number of their films organized by number of films descendent and name ascendent*/
		
		$actor_details = DB::table('films')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
            ->select( 'actors.name as actores', 'films.name')
			->where ('actors.name', 'actores')
			->orderBy('actors.name', 'desc')
			->groupBy('actors.name')
			->get();	
			
			
		/* List of films and their actors organized by number of films descendent and name ascendent*/
		
		$actorsxfilm = DB::table('films')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
            ->select('actors.id', 'films.name', 'films.slug', DB::raw('count(*) as total'))
			->orderBy('total', 'desc')
			->groupBy('films.name')
			->get();
			
        //return a1l view and pass in the above variable.
        return view('films.all')
                ->withFilms($films)
                ->withCategories($categories)
                ->withLanguages($languages)
                ->withAges($ages)
                ->withTotal($total)
				->withFilmsxage($filmsxage)
				->withFilmsxcategory($filmsxcategory)
				->withFilmsxlanguage($filmsxlanguage)
				->withFilmsxactor($filmsxactor)
				->withActor_details($actor_details)
				->withActorsxfilm($actorsxfilm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCategory()
    {
        //
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
