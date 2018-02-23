<section id="carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide carousel-img" src="{{ $slides[0]->image }}" alt="{{ $slides[0]->name }}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><a href="{{ 'films/'.$slides[0]->slug }}"> {{ $slides[0]->name }}</a></h1>
                        <p class="description">{{ substr(strip_tags($slides[0]->description), 0, 300) }}{{ strlen(strip_tags($slides[0]->description)) > 300 ? "..." : "" }}</p><br>
                        <p class="details">Genre: {{ $slides[0]->category }} | Language: {{ $slides[0]->language }} | For: {{ $slides[0]->fsk }} years old</p>
                    </div>
                </div>
            </div>
            <?php for ($x = 1; $x <= 4; $x++) : ?>
                <div class = "item">
                    <img class = "first-slide carousel-img" src = "{{ $slides[$x]->image }}" alt = "{{ $slides[$x]->name }}">
                    <div class = "container">
                        <div class = "carousel-caption">
                            <h1><a href = "{{ 'films/'.$slides[$x]->slug }}">{{ $slides[$x]->name }}</a></h1>
                            <p class = "description">{{ substr(strip_tags($slides[$x]->description), 0, 150) }}{{ strlen(strip_tags($slides[$x]->description)) > 150 ? "..." : "" }}</p>
                            <p class="details">Genre: {{ $slides[$x]->category }} | Language: {{ $slides[$x]->language }} | For: {{ $slides[$x]->fsk }} years old</p>
                        </div>
                    </div>
                </div>
            <?php endfor; ?> 

        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->
</section>