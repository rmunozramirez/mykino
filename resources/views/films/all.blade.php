@extends('layout')

@section('title', "| All my films")

@section('content')

<section id="content">        
    <div  class="row">
        <div class="film-list col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs responsive" role="tablist">
                <li role="presentation" class="tab-responsive active">
                    <a href="#all" aria-controls="home" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>All films
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#categories" aria-controls="profile" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>Categories
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#languages" aria-controls="messages" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-font" aria-hidden="true"></span>Languages
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#ages" aria-controls="settings" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Age classification
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content responsive ">
                <div role="tabpanel" class="tab-pane active" id="all">
                    <div class="panel panel-default">
						<div class="panel-heading"> 
							<h3>A collection of <?php echo count($total); ?> films</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-responsive table-hover">
								<thead>
								<th><a href="?orderBy=name">Film</a></th>
								<th>Language</a></th>
		<!--                        <th>
									{{ Form::select('selected_language', array('All' => 'All languages', 'english' => 'English', 'german' => 'German','spanish' => 'Spanish','french' => 'French', 'chinese' => 'Chinese'), 'A') }}
								</th>-->
								<th class="mobile">Category</a></th>
								<th class="mobile">FSK</a></th>
								<th class="mobile">Year</a></th>
								<th>Trailer</th>
								</thead>
								<tbody>
									@foreach ($films as $film)
									<tr>
										<td><a href="{{ route('films.show', $film->slug) }}"><img height="50" src="{{ $film->image }}" alt="{{ $film->name }}"></a>
											<a href="{{ route('films.show', $film->slug) }}"> {{ $film->name }}</a></td>
										<td class="mobile"><a href="{{ route('languages.show', $film->slug_language) }}">{{ $film->language }}</a></td>
										<td class="mobile"><a href="{{ route('categories.show', $film->slug_category) }}">{{ $film->category }}</a></td>
										<td class="mobile"><a href="{{ route('ages.show', $film->slug_fsk) }}"><img height="50" src="{{ $film->image_fsk }}" alt="{{ $film->name }}"></a></td>
										<td class="mobile"><a href="{{ 'year/'. date('Y', strtotime($film->year)) }}">{{ date('Y', strtotime($film->year)) }}</a></td>
										<td><a href="{{ $film->trailer }}"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span></a></td>
									</tr>
									@endforeach

								</tbody>
							</table>
							<div class="text-center">
								{{ $films->links() }}
							</div>
						</div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="categories"> 
                    <div class="panel panel-default">
						<div class="panel-heading">            
							<h3><?php echo count($total); ?> films in <?php echo count($categories); ?> categories</h3>
						</div>
						<div class="panel-body">		
							<table class="table table-striped table-responsive table-hover">
								<thead>
								<th>Categories</th>
								<th>Number of films</th>
								</thead>
								<tbody>
									@foreach ($filmsxcategory as $category)
									<tr>
										<td><a href="{{ route('categories.show', $category->slug_category) }}">{{ $category->category }}</a></td>
										<td>{{ $category->total }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="languages">
                    <div class="panel panel-default">
						<div class="panel-heading">
							<h3><?php echo count($total); ?> films in <?php echo count($languages); ?> languages</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-responsive table-hover">
								<thead>
								<th>Language</th>
								<th>Number of films</th>
								</thead>
								<tbody>
									@foreach ($filmsxlanguage as $language)
									<tr>
										<td><a href="{{ route('languages.show', $language->slug_language) }}">{{ $language->language }}</a></td>
										<td>{{ $language->total }}</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
                </div>
                <div role="tabpanel" class="tab-pane" id="ages">
                    <div class="panel panel-default">
						<div class="panel-heading">
							<h3><?php echo count($total); ?> films in <?php echo count($ages); ?> age clasifications</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-responsive table-hover">
								<thead>
								<th>Age category</th>					
								<th>Number of films</th>						
								</thead>
								<tbody>
									@foreach ($filmsxage as $age)
									<tr>
										<td><a href="{{ route('ages.show', $film->slug_fsk) }}"><img height="50" src="{{ $age->image_fsk }}" alt="{{ $film->name }}"></a></td>
										<td>{{ $age->total }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div> 
					</div> 
				</div> 
            </div>
        </div>
</section>
@endsection

