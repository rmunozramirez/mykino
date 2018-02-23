@extends('layout')

<?php $titleTag = htmlspecialchars $month_year; ?>
@section('title', "|  films")

@section('content')

<section id="content">        
    <div  class="row">          
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
					<button class="submit">
				</form>
			</div>
		</div>
		<div class="col-lg-12">			
			<pre>		
				<?php echo $year_month_film; ?>
			</pre>
		</div>

	</div>
</section>
@endsection

