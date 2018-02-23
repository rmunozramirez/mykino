@extends('layout')

<?php $titleTag = htmlspecialchars($language->language); ?>
@section('title', "| Language: $titleTag")

@section('content')

<section id="content">        
    <div  class="row">
        <div  class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bottom-30">
                    <h3>Language {{ $language->language}}: <?php echo count($total); ?> films</h3>
                </div>
                <div class="panel-body">
                    <div  class="row">
                        <table class="table table-striped table-responsive table-hover">
                            <thead>
                            <th>Film</th>
                            <th class="mobile">Category</th>
                            <th class="mobile">FSK</th>
                            <th class="mobile">Year</th>
                            <th>Trailer</th>
                            </thead>
                            <tbody>
                                @foreach ($films as $film)
                                <tr>
                                    <td><a href="{{ route('films.show', $film->slug) }}"><img height="50" src="/{{ $film->image }}" alt="{{ $film->name }}"></a>
                                        <a href="{{ route('films.show', $film->slug) }}">{{ $film->name }}</a></td>
                                    <td><a href="{{ route('categories.show', $film->slug_category) }}">{{ $film->category }}</a></td>
                                    <td class="mobile"><a href="{{ route('ages.show', $film->slug_fsk) }}"><img height="50" src="/{{ $film->image_fsk }}" alt="{{ $film->name }}"></a></td>
                                    <td class="mobile"><a href="{{ route('year.show', date('Y', strtotime($film->year))) }}">{{ date('Y', strtotime($film->year)) }}</a></td>
                                    <td><a href="{{ $film->trailer }}"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $films->links() }}
                        </div>
                    </div>                
                </div>
            </div>
        </div>
</section>
@endsection