@extends('layout')

@section('title', '| My Films')

@section('content')
<section id="content"> 
    
    <div class="row">
    <div class="col-md-12 col-xs-12">
        <h3 class="post-title">A collection of <?php echo count($total); ?> films</h3>
                    @include('partials._messages')    </div>
    <div class="col-lg-12">
        <!-- Three columns of text below the carousel -->
        @foreach ($films as $film)
        <a class="image-box" href="{{ 'films/'.$film->slug }}">
            <img src="{{ $film->image }}" alt="{{ $film->name }}" class="image img-responsive">
        </a>
        @endforeach     

    </div><!-- /.row -->   
    <div class="text-center">
        {{ $films->links() }}
    </div>
    </div>
    
</section>
@endsection