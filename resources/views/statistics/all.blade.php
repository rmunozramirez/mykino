@extends('layout')

@section('title', "| Statistics")

@section('content')

<section id="content">        
    <div  class="row">
        <div class="film-list col-md-12 responsive">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs responsive" role="tablist">

                <li role="presentation" class="tab-responsive active">
                    <a href="#statistics_actors" aria-controls="home" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Actors
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#statistic_films" aria-controls="profile" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>Films
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#miscelaneas" aria-controls="profile" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>Miscellaneous
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#no_finish" aria-controls="profile" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>To do
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content responsive">
			
                <div role="tabpanel" class="tab-pane active" id="statistics_actors">
                    <div class="row">
						<div class="col-lg-12">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Actors</a>:
										<?php echo count($filmsxactor) ;?>
										</h2>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Actor</th>
												<th>Films</th>
												</thead>
												<tbody>  
												   @foreach ($filmsxactor as $film_actor)
													<tr>
														<td><!-- img class="actor-img" src="{{asset( $film_actor->foto) }}" height="60"/ -->
														<a href="{{ route('actors.show', $film_actor->slug) }}">{{ $film_actor->name }}</a></td>
														<td>{{ $film_actor->total }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>	
										</div>
									</div>
								</div>
							</div>						
						</div>
					</div> 
                </div> 
                <div role="tabpanel" class="tab-pane" id="statistic_films">
                    <div class="row">
					   <div class="col-lg-12">
							<div class="panel-group" id="accordion6" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading6">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion6" href="#collapse6" aria-expanded="true" aria-controls="collapse1">Actors per film</a></h2>
									</div>
									<div id="collapse6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading6">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Actors</th>
												</thead>
												<tbody>
											  
												   @foreach ($actorsxfilm as $actor_film)
													<tr>
														<td><a href="{{ route('films.show', $actor_film->slug) }}"> {{ $actor_film->name }}</a></td>
														<td>{{ $actor_film->total }}</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				
				
				<div role="tabpanel" class="tab-pane" id="miscelaneas">
                    <div class="row">
						<div class="col-lg-12">
							<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">					
								<div class="panel panel-default">
								   <div class="panel-heading" role="tab" id="heading2-1">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2-1" aria-expanded="true" aria-controls="collapse1">Newest films in collection</a></h2>
									</div>
									<div id="collapse2-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2-1">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Desde</th>
												</thead>
												<tbody>
											  
												   @foreach ($estrenosfilm as $estreno)
													<tr>
														<td><a href="{{ route('films.show', $estreno->slug) }}"> {{ $estreno->name }}</a></td>
														<td>{{ date('d F Y', strtotime($estreno->updated_at)) }}</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>								
								<div class="panel panel-default">
								   <div class="panel-heading" role="tab" id="heading2-2">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2-2" aria-expanded="true" aria-controls="collapse1">Five oldest films</a></h2>
									</div>
									<div id="collapse2-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2-2">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Year</th>
												</thead>
												<tbody>
											  
												   @foreach ($oldfilm as $old)
													<tr>
														<td><a href="{{ route('films.show', $old->slug) }}"> {{ $old->name }}</a></td>
														<td>{{ date('d F Y', strtotime($old->year)) }}</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
								   <div class="panel-heading" role="tab" id="heading2-3">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2-3" aria-expanded="true" aria-controls="collapse1">Five newest films</a></h2>
									</div>
									<div id="collapse2-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2-3">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Year</th>
												</thead>
												<tbody>
											  
												   @foreach ($newfilm as $new)
													<tr>
														<td><a href="{{ route('films.show', $new->slug) }}"> {{ $new->name }}</a></td>
														<td>{{ date('d F Y', strtotime($new->year)) }}</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>	
								<div class="panel panel-default">
								   <div class="panel-heading" role="tab" id="heading2-4">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2-4" aria-expanded="true" aria-controls="collapse1">Five longest films</a></h2>
									</div>
									<div id="collapse2-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2-4">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Duration</th>
												</thead>
												<tbody>
											  
												   @foreach ($longfilm as $long)
													<tr>
														<td><a href="{{ route('films.show', $long->slug) }}"> {{ $long->name }}</a></td>
														<td>{{ $long->duration }}</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>	
								<div class="panel panel-default">
								   <div class="panel-heading" role="tab" id="heading2-5">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2-5" aria-expanded="true" aria-controls="collapse1">Five shortest films</a></h2>
									</div>
									<div id="collapse2-5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2-5">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Duration</th>
												</thead>
												<tbody>
											  
												   @foreach ($shortfilm as $short)
													<tr>
														<td><a href="{{ route('films.show', $short->slug) }}"> {{ $short->name }}</a></td>
														<td>{{ $short->duration }}</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="no_finish">
                    <div class="row">
						<div class="col-lg-7">	
							<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading1">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="true" aria-controls="collapse1">Films with not actor assigned</a>:
										<?php echo count($films_with_no_actors) ;?>
										</h2>
									</div>
									<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Film</th>
												<th>Category</th>
												</thead>
												<tbody>
												   @foreach ($films_with_no_actors as $no_actors)
													<tr>
														<td><a href="{{ route('films.show', $no_actors->slug) }}"> {{ $no_actors->name }}</a></td>
														<td><a href="{{ route('categories.show', $no_actors->filmcategory) }}">{{ $no_actors->filmcategory }}</a></td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>					

						
						
						<div class="col-lg-5">	
							<div class="panel-group" id="accordion10" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading10">
										<h2 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion10" href="#collapse10" aria-expanded="true" aria-controls="collapse10">Actors with not film assigned</a>:
										<?php echo count($actors_with_no_films) ;?>
										</h2>
									</div>
									<div id="collapse10" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading10">
										<div class="panel-body">
											<table class="table table-striped table-responsive table-hover">
												<thead>
												<th>Actors</th>
												</thead>
												<tbody>
												   @foreach ($actors_with_no_films as $no_films)
													<tr>
														<td><a href="{{ route('actors.show', $no_films->slug) }}"> {{ $no_films->name }}</a></td></a></td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

