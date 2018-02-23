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

class ActorController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
    }
	
  /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $actores = DB::table('actors')
            ->join('actor_film', 'actor_film.actor_id', '=', 'actors.id')
            ->join('films', 'films.id', '=', 'actor_film.film_id')
            ->join('categories', 'films.category_id', '=', 'categories.id')
            ->select('films.name as filmname', 'films.trailer', 'films.image as filmimage', 
                    'films.slug as filmslug', 'categories.category', 'categories.slug_category' , 
                    'actors.name', 'actors.foto')
            ->where('actors.slug', "=", $slug)
			->get();
			
        $actor = DB::table('actors')
            ->join('actor_film', 'actor_film.actor_id', '=', 'actors.id')
            ->join('films', 'films.id', '=', 'actor_film.film_id')
            ->join('categories', 'films.category_id', '=', 'categories.id')
            ->select('films.name as filmname', 'films.trailer', 'films.image as filmimage', 
                    'films.slug as filmslug', 'categories.category', 'categories.slug_category' , 
                    'actors.name', 'actors.foto', 'actors.id')
            ->where('actors.slug', "=", $slug)
			->first();			

			
        $prev = $actor->id - 1;
        $actor_prev = DB::table('actors')
                    ->select('actors.*')
                    ->where('actors.id', '=', $prev)->first();  

        $next = $actor->id + 1;  
        $actor_next = DB::table('actors')
                    ->select('actors.*')
                    ->where('actors.id', '=', $next)->first(); 
			
		
        return view('actors.show')
				->withActores($actores)
				->withActor_prev($actor_prev)
				->withActor_next($actor_next);
		
    }
}
