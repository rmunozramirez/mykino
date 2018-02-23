@extends('layout')

<!-- ?php $titleTag = htmlspecialchars $month_year; ? -->
@section('title', "|  films")

@section('content')

<section id="content">        
    <div  class="row">          
		<div  class="col-md-12">          
			<div class="post-title">
				<h3 class="pull-left">
				</h3>	
				<div class="pull-right">
					<form action="StatisticsController@month_year" method="post" accept-charset="UTF-8">
						<select>
						  <option value="all" selected>All dates</option>
							<?php foreach ($available_years_with_months as $month_year): ?>
								<option value="<?php echo $month_year; ?>">
									<?php echo $month_year; ?>
								</option> 
							<?php endforeach; ?>
						</select>
						<input class="btn btn-default" type="submit">
					</form>
				</div>
			</div>
			<div class="content">			
				@foreach ($films as $film)
				<article class="featured">
					<div  class="row">           
						<div class="col-md-3">
							<img height="250" width="175" class="" src="{{asset( $film->image) }}" / >
						</div>
						<div class="col-md-9 separator">
							<h1><a href="{{ route('films.show', $film->slug) }}"> {{ $film->name }}</a></h1>
						
							<a href="{{ route('categories.show', $film->slug_category) }}">{{ $film->category }}</a> | added on: {{ date('d F Y', strtotime($film->filmcreated)) }}
								| Featuring: <?php echo $film->actors_name ?>
							<hr>
							<?php 
							echo (strlen($film->description) < 300) ? $film->description : substr($film->description, 0, 300) . "... ";
							?>
							<span class="italic"><a href="{{ route('films.show', $film->slug) }}">read more</a></span>
						</div>
					</div>
				</article>
				@endforeach
			</div>
			<div class="text-center">
				{{ $films->links() }}
			</div>	
		</div>
	</div>
</section>
@endsection

