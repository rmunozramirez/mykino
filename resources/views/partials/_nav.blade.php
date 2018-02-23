<section id="nav">
	<nav class="navbar navbar-default navbar-tall navbar-full" role="navigation">
	  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">My Kino - My <?php echo count($total); ?> films</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div class="navbar-right">	
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Home</a></li>
					<li><a href="{{ route('statistics.month') }}">Films of <?php echo $month; ?></a></li>
					<li><a href="{{ route('films.all') }}">Filmotheke</a></li>        
					<li><a href="{{ route('statistics.all') }}">Statistics</a></li>
				</ul>
			</div>
		</div>
	</nav>
</section>