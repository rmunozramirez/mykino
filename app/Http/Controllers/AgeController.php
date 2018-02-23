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

class AgeController extends Controller
{
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
            ->select('films.*', 'languages.language', 'languages.slug_language','categories.category', 'categories.slug_category','fsks.fsk', 'fsks.image_fsk')
            ->where('fsks.slug_fsk', '=', $slug)
            ->paginate(10);
        
        $total = Film::orderBy('id', 'desc')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('films.*')
            ->where('fsks.slug_fsk', '=', $slug)
            ->get();
        
        $age = DB::table('fsks')
            ->where('fsks.slug_fsk', '=', $slug)->first();
        
        return view('ages.show')->withFilms($films)->withTotal($total)->withAge($age);
    }
}
