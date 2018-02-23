@extends('layout')

@section ('title', '| My films')
@section('content')
<section id="content">
    <div class="row">
        <!-- Three columns of text below the carousel -->
        @foreach ($films as $film)
        <div class="col-md-3">
            <div class="event-box">
                <div class="card hovercard">
                    <img src="{{ $film->image }}" alt="{{ $film->name }}" class="image img-responsive"> 
                </div>		    
                <div class="col-md-12">
                    <header class="event-header">
                        <h4 class="title"><a href="{{ 'films/'.$film->id }}"> {{ $film->name }}</a></h4>	  

                        <div class="info">
                            <p class="description">{{ substr(strip_tags($film->description), 0, 70) }}{{ strlen(strip_tags($film->description)) > 70 ? "..." : "" }}</p>
 

                            <p>
                                Rate: 
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>                 
                            </p>
                        </div>
                    </header>	
                </div>

            </div>
        </div>
        @endforeach     

    </div><!-- /.row -->   
    <div class="text-center">
        {{ $films->links() }}
    </div>

</section>
@endsection