@extends('layout')

<?php $titleTag = htmlspecialchars($actores[0]->name); ?>
@section('title', "| $titleTag")

@section('content')
<section id="content">        
    <div  class="row">
        <div  class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bottom-30">
                    <h3 class="text-center"><?php echo $actores[0]->name ?></h3>
                    @include('partials._messages')
					                
					<div  class="row">
						<div  class="col-md-12">
							<div  class="col-md-6">
								<a href="{{ route('actors.show', $actor_prev->slug) }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> {{ $actor_prev->name }}</a>
							</div>
							<div  class="col-md-6">
								<a class="pull-right" href="{{ route('actors.show', $actor_next->slug) }}">{{ $actor_next->name }} <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
							</div>
						</div>
					</div>
					
					
                </div>
                <div class="panel-body">
                    <div  class="row">
                        <div  class="col-md-4">
                               <img class="actor-img" src="{{asset( $actores[0]->foto) }}" width="100%" class="bottom-30"/>
							   <!-- span style="font-size: 330px; margin-left: 30px;" class="glyphicon glyphicon-user" aria-hidden="true"></span -->
                        </div>
                        <div class="col-md-8">
                            <div class="post-title">
                                <h3><?php echo count($actores); ?> films from {{$actores[0]->name}}</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive table-hover">
                                    <thead>
										<th>Film</th>
										<th></span>Category</a></th>
										<th>Trailer</th>
                                    </thead>
                                    <tbody>
                                    <tbody>  
                                        @foreach ($actores as $actor)
                                        <tr>
                                            <td><a href="{{ route('films.show', $actor->filmslug) }}"><img height="50" src="http://localhost:8000/{{ $actor->filmimage }}" alt="{{ $actor->filmname }}"></a>
                                                <a href="{{ route('films.show', $actor->filmslug) }}"> {{ $actor->filmname }}</a></td>

                                            <td><a href="{{ route('categories.show', $actor->slug_category) }}">{{ $actor->category }}</a></td>
                                            <td><a href="{{ $actor->trailer }}"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span></a></td>
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
</section>
@endsection
