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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in the database
        $categories = DB::table('categories')
            ->orderBy('category', 'asc')
            ->paginate(10);
        
        $filmscat = DB::table('films')
                ->join('categories', 'categories.id', '=', 'films.category_id')
                ->select(DB::raw('count(*) as film_name, films.name'))
                ->select('films_name', 'categories.category')
                ->groupBy('categories.category');
       

        //return a1l view and pass in the above variable.
        return view('categories.index')->withCategories($categories)->withFilmscat($filmscat);
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
    public function show($slug)
    {
        $films = Film::orderBy('id', 'desc')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('films.*', 'languages.language', 'languages.slug_language','categories.category', 'categories.slug_category','fsks.fsk', 'fsks.image_fsk', 'fsks.slug_fsk')
            ->where('categories.slug_category', '=', $slug)
            ->paginate(10);
        
        $total = Film::orderBy('id', 'desc')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->select('films.*')
            ->where('categories.slug_category', '=', $slug)
            ->get();
        
        $category = DB::table('categories')
            ->where('categories.slug_category', '=', $slug)->first();
        
        return view('categories.show')->withFilms($films)->withTotal($total)->withCategory($category);
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
