@extends('layout')

<?php $titleTag = htmlspecialchars($month); ?>
@section('title', "| $titleTag 's films")

@section('content')

<section id="content">        
    <div  class="row">           
                
        <div class="film-list col-md-12">
        <h3 class="post-title"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo count($current_month_film) ;?> films added in <?php echo $month; ?></h3>
           		
			<div class="row">
			   <div class="col-lg-12">
					@foreach ($current_month_film as $month_film)
					<article class="featured">
						<div  class="row">           
							<div class="col-md-2">
								<img height="225" width="160" class="" src="{{asset( $month_film->image) }}" / >
											<!-- span style="font-size: 110px; margin: 40px;"  class="glyphicon glyphicon-play-circle" aria-hidden="true"></span-->
							</div>
							<div class="col-md-10 separator">
								<h2><a href="{{ route('films.show', $month_film->slug) }}"> {{ $month_film->name }}</a></h2>
							
								<a href="{{ route('categories.show', $month_film->slug_category) }}">{{ $month_film->category }}</a> 
								| added on: {{ date('d F Y', strtotime($month_film->filmcreated)) }} 
								| Duration: <?php echo $month_film->duration ?>
								| Featuring: <?php echo $month_film->actors_name ?>
								<hr>
								<?php 
								echo (strlen($month_film->description) < 300) ? $month_film->description : substr($month_film->description, 0, 300) . "... ";
								?>
								<span class="italic"><a href="{{ route('films.show', $month_film->slug) }}">read more</a></span>
							</div>
							
						</div>
					</article>
					@endforeach				
				</div>			
			</div>
		</div>
	</div>
</section>
@endsection

