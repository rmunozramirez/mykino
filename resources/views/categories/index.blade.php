@extends('layout')

@section('title', "| All Categories")

@section('content')
<section id="content">        
    <div  class="row">
        <div class="col-md-12">
            <h1>All Categories</h1>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Date</th>
                </thead>

                <tbody>

                    @foreach ($categories as $category)
                    
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td><a href="{{ route('categories.show', $category->slug) }}">{{ $category->category }}</a></td>
                        <td>{{ date('M j, Y', strtotime($category->created_at)) }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{ $categories->links() }}
    </div>
</section>
@endsection
