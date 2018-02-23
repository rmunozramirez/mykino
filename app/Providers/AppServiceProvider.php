<?php

namespace App\Providers;
use Carbon\Carbon;
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
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		View::composer('*', function ($view) {
			$month = Carbon::now()->format('F');
			
			$films = Film::orderBy('films.created_at', 'desc')
				->join('languages', 'languages.id', '=', 'films.language_id')
				->join('categories', 'categories.id', '=', 'films.category_id')
				->join('fsks', 'fsks.id', '=', 'films.fsk_id')
				->select('films.*', 'languages.*', 'categories.*', 'fsks.*')
				->paginate(24);

        $total = Film::all();

			$view->withMonth($month)->withFilms($films)->withTotal($total);
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
