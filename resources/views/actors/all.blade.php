@extends('layout')

@section('title', "| Statistics")

@section('content')

<section id="content">        
    <div  class="row">
        <div class="film-list col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs responsive bottom-30" role="tablist">
                <li role="presentation" class="tab-responsive active">
                    <a href="#statistics_actors" aria-controls="home" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>Actors
                    </a>
                </li>
                <li role="presentation" class="tab-responsive">
                    <a href="#statistic_films" aria-controls="profile" role="tab" data-toggle="tab">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>Films
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content responsive ">
                <div role="tabpanel" class="tab-pane" id="statistics_actors">
                    <div class="row">
						<div class="col-lg-6">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
									<h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Actors</a></h3>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<table class="table table-striped table-responsive table-hover">
											<thead>
											<th>Actor</th>
											<th>Films</th>
											</thead>
											<tbody>  
											   @foreach ($filmsxactor as $film_actor)
												<tr>
													<td><a href="#">{{ $film_actor->name }}</a></td>
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
						<div class="col-lg-6">
						
						</div> 
					</div> 
                </div> 
                <div role="tabpanel" class="tab-pane" id="statistic_films">
                    <div class="row">
                   <div class="col-lg-6">
						<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading1">
									<h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="true" aria-controls="collapse1">Films</a></h3>
								</div>
								<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
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
                    <div class="col-lg-6">

					</div>
                </div>
            </div>
        </div>
</section>
@endsection

