@extends('layout')

@section('title', "| Films of the year")

@section('content')

<section id="content">        
    <div  class="row">
        <div class="col-md-12">
            
            <h3 class="post-title"><?php echo count($total); ?> films of year </h3>
            <table class="table table-striped table-responsive table-hover">
                <thead>

                <th>Image
                    <a href="?orderBy=name"><span class="small glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Name</a>
                </th>
                <th class="mobile"><a href="?orderBy=category"><span class="small glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Category</a></th>
                <th class="mobile"><a href="?orderBy=language"><span class="small glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Language</a></th>
                <th class="mobile"><a href="?orderBy=year"><span class="small glyphicon glyphicon-chevron-down" aria-hidden="true"></span>Year</a></th>
                <th>Trailer</th>
                </thead>
                <tbody>

                    @foreach ($films as $film)

                    <tr>

                        <td><a href="{{ route('films.show', $film->slug) }}"><img height="50" src="/{{ $film->image }}" alt="{{ $film->name }}"></a>
                        <a href="{{ route('films.show', $film->slug) }}">{{ $film->name }}</a></td>
                        <td><a href="{{ route('categories.show', $film->slug_category) }}">{{ $film->category }}</a></td>
                        <td><a href="{{ route('languages.show', $film->slug_language) }}">{{ $film->language }}</a></td>
                        <td class="mobile">{{ date('Y', strtotime($film->year)) }}</td>
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
</section>
@endsection