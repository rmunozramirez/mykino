@extends('layout')

<?php $titleTag = htmlspecialchars($film->name); ?>
@section('title', "| $titleTag")

@section('content')
<section id="content">        
    <div  class="row">
    <div  class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading bottom-30">
                    <h3 class="text-center">{{ $film->name }}<span class="pull-right"></h3>
                    @include('partials._messages')
                <div  class="row">
                    <div  class="col-md-12">
                        <div  class="col-md-6">
                            <a href="{{ route('films.show', $film_prev->slug) }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> {{ $film_prev->name }}</a>
                        </div>
                        <div  class="col-md-6">
                            <a class="pull-right" href="{{ route('films.show', $film_next->slug) }}">{{ $film_next->name }} <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                
                <div  class="row">
                    <div  class="col-md-4">
                        <div class="row">
						                            <!-- div class="bottom-50 col-md-12" style="background: #f5f5f5 none repeat scroll 0 0; border: 1px solid rgb(222, 222, 222); box-shadow: 3px 3px 1px rgb(222, 222, 222); text-align: center; margin-left: 30px; width: 340px; padding: 20px;">
														<span style="font-size: 300px;" class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
														{{ $film->name}}
													</div-->
                            <div class="col-md-12">
                                <img src="{{asset( $film->image) }}" width="100%" class="actor-img"/>
                            </div>
                            <div class="bottom-50 col-md-12">
                                <div class="col-md-6">
                                    {!! Html::linkRoute('films.edit', 'Edit', array($film->slug), array('class' => 'btn btn-success btn-block')) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::open(['route' => ['films.destroy', $film->slug], 'method' => 'DELETE']) !!}

                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active tab-responsive">
                                <a href="#descripcion" aria-controls="descripcion" role="tab" data-toggle="tab">
                                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>Resume
                                </a>
                            </li>
                            <li role="presentation" class="tab-responsive">
                                <a href="#technical" aria-controls="technical" role="tab" data-toggle="tab">
                                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>Sinopsis
                                </a>
                            </li>
                            <li role="presentation" class="tab-responsive">
                                <a href="#actors" aria-controls="technical" role="tab" data-toggle="tab">
                                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>Actors
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="descripcion">
                                <div class="content">

                                    <div class="col-md-9">
                                        <dl class="dl-horizontal">            
                                            <dt>Title:</dt><dd>{!! $film->name !!}</dd>
                                            <dt>Genre:</dt><dd><a href="{{ route('categories.show', $category->slug_category) }}">{!! $film->category !!}</a></dd>
                                            <dt>Date:</dt><dd>{!! $film->year !!}</dd>
                                            <dt>Duration:</dt><dd>{!! $film->duration !!}</dd>
                                            <dt>Language:</dt><dd>{!! $film->language !!}</dd>
                                            <dt>Trailer:</dt><dd><a href="{!! $film->trailer !!}">{!! $film->name !!}</a></dd>
                                            <dt>Age:</dt><dd><a href="{{ route('ages.show', $film->slug_fsk) }}"><img height="50" src="/{{ $film->image_fsk }}" alt="{{ $film->name }}"></a></dd>
                                        </dl>

                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="technical">
                                <div class="content">
                                    <div class="content bottom-50 contenido">{!! $film->description !!}</div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="actors">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3>Actors playing in "<?php echo ($film->name); ?>"</h3>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-responsive table-hover">
                                                    <tbody>
                                                    <tbody>  
                                                        @foreach ($actor_in_film as $actor)
                                                        <tr>
                                                            <td><a href="{{ route('actors.show', $actor->slug) }}"> {{ $actor->name }}</a></td>
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
            <div class="panel-footer">
                <div  class="row">
                    <div  class="col-md-12">
                        <div  class="col-md-6">
                            <a href="{{ route('films.show', $film_prev->slug) }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> {{ $film_prev->name }}</a>
                        </div>
                        <div  class="col-md-6">
                            <a class="pull-right" href="{{ route('films.show', $film_next->slug) }}">{{ $film_next->name }} <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
