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
use Carbon\Carbon;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		/* List of actors and total number of their films organized by number of films descendent and name ascendent*/
		
		$filmsxactor = DB::table('films')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
            ->select('films.id', 'actors.slug', 'actors.name', 'actors.id as actorid', 'actors.foto', DB::raw('count(*) as total'))
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
	
		$estrenosfilm = DB::table('films')
			->select('films.name', 'films.updated_at', 'films.slug')
			->orderBy('films.updated_at', 'desc')
			->take(5)->get();	
			
		$oldfilm = DB::table('films')
			->select('films.name', 'films.year', 'films.slug')
			->orderBy('films.year', 'asc')
			->take(5)->get();
	
		$newfilm = DB::table('films')
			->select('films.name', 'films.year', 'films.slug')
			->orderBy('films.year', 'desc')
			->take(5)->get();
	
		$longfilm = DB::table('films')
			->select('films.name', 'films.duration', 'films.slug')
			->orderBy('films.duration', 'desc')
			->take(5)->get();			
	
		$shortfilm = DB::table('films')
			->select('films.name', 'films.duration', 'films.slug')
			->orderBy('films.duration', 'asc')
			->take(5)->get();

			
		$actors_with_films = DB::table('films')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
			->select( 'actors.id')
			->groupBy('actors.id')
			->pluck('id')->toArray();

		$actors_with_no_films = DB::table('actors')
			->select( 'actors.name', 'actors.slug')
			->whereNotIn('actors.id', $actors_with_films)
			->orderBy('actors.id', 'desc')
			->take(500)
			->get();
			
		$films_with_actors = DB::table('films')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
			->select( 'films.id')
			->groupBy('films.id')
			->pluck('id')->toArray();

		$films_with_no_actors = DB::table('films')
			->join('categories', 'films.category_id', '=', 'categories.id')
			->select( 'films.name', 'categories.category as filmcategory', 'films.slug')
			->whereNotIn('films.id', $films_with_actors)
			->where('categories.category', '<>', 'Animate')
			->orderBy('films.id', 'desc')
			->take(500)
			->get();   



        //return a1l view and pass in the above variable.
        return view('statistics.all')
				->withFilmsxactor($filmsxactor)
				->withActor_details($actor_details)
				->withActorsxfilm($actorsxfilm)
				->withEstrenosfilm($estrenosfilm)
				->withLongfilm($longfilm)
				->withShortfilm($shortfilm)
				->withOldfilm($oldfilm)
				->withFilms_with_no_actors($films_with_no_actors)
				->withActors_with_no_films($actors_with_no_films)

				->withNewfilm($newfilm);
    }
	
	public function getTime()
    {				
		/* Select the month and year in which there were added new films */
	
		$available_years_with_months = [];
		$month = Carbon::now()->format('F');	
		
		$all_year_and_months = DB::table('films')
		   ->select('*')
		   ->orderBy('films.created_at', 'desc')
		   ->get()->each(function($film) use (&$available_years_with_months) {
			 $date = Carbon::parse($film->created_at);
			 $year = $date->format('Y');
			 $month = $date->format('F');
			 $month_year = $month."-".$year;
			 $available_years_with_months[] = $month_year;
			 $available_years_with_months = array_unique($available_years_with_months);
		   });

		return view('statistics.time')
				->withAll_year_and_months($all_year_and_months)
				->withAvailable_years_with_months($available_years_with_months);		
	}	
	
	public function month_year ($month_year = null) {
		
		$year_month_film = DB::table('films')
			->select('films.*')
			->whereMonth('films.created_at',  '=', Carbon::now()->month)
			->whereYear('films.created_at',  '=', Carbon::now()->year)
			->orderBy('films.created_at', 'desc')
			->get();
			
		return view('statistics.month_year')
			->withYear_month_film($year_month_film);
			
	}
	
	public function show()
    {				
		/* Select all films included in the last MONTH */
	
		$current_month_film = DB::table('films')
			->join('categories', 'films.category_id', '=', 'categories.id')
			->join('actor_film', 'actor_film.film_id', '=', 'films.id')
			->join('actors', 'actors.id', '=', 'actor_film.actor_id')
			->select('films.name', 'films.slug','films.created_at as filmcreated', 'films.category_id', 'films.image', 'films.description', 'films.duration', 'categories.slug_category', 'categories.category',
					'actors.name as actors_name')
			->whereMonth('films.created_at', '=', Carbon::now()->month)
			->orderBy('films.created_at', 'desc')
			->groupBy('films.name')
			->get();
			
		$month = Carbon::now()->format('F');
		return view('statistics.month')
				->withCurrent_month_film($current_month_film)
				->withMonth($month);
	}
}

