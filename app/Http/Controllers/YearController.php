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

class YearController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
        $films = Film::orderBy('id', 'desc')
            ->join('languages', 'languages.id', '=', 'films.language_id')
            ->join('categories', 'categories.id', '=', 'films.category_id')
            ->join('fsks', 'fsks.id', '=', 'films.fsk_id')
            ->select('films.*', 'languages.language', 'languages.slug_language','categories.category', 'categories.slug_category','fsks.fsk', 'fsks.image_fsk')
            ->where('films.year', 'LIKE', $year.'%')
            ->paginate(10);
        
        $total = Film::orderBy('id', 'desc')
            ->select('films.*')
            ->where('films.year', 'LIKE', $year.'%')
            ->get();
        
        $theyear = DB::table('films')
            ->where('films.year', 'LIKE', $year.'%')
            ->first();
        
        return view('year.show')->withFilms($films)->withTotal($total)->withTheyear($theyear);
    }
}
