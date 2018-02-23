<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Film;
use App\Category;
use App\Language;
use App\Fsk;
use Image;
use Session;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function show($slug)
    {
       $films = Film::orderBy('id', 'desc')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('films.*', 'languages.language', 'languages.slug_language', 'categories.category', 'categories.slug_category','fsks.fsk', 'fsks.image_fsk', 'fsks.slug_fsk')
            ->where('languages.slug_language', '=', $slug)
            ->paginate(10);
        
        $total = Film::orderBy('id', 'desc')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->select('films.*')
            ->where('languages.slug_language', '=', $slug)
            ->get();
        
        $language = DB::table('languages')
            ->where('languages.slug_language', '=', $slug)->first();
        
        return view('languages.show')->withFilms($films)->withTotal($total)->withLanguage($language);
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
