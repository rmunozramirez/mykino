@extends('layout')

@section('title', '| Edit Film')

@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::model($film, ['route' => ['films.update', $film->slug], 'method' => 'PUT']) !!}
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            {{Form::label('trailer', 'Trailer link:', array('class' => 'form-spacing-top'))}}
            {{Form::text('trailer', null, array('class' => 'form-control')) }}

            {{Form::label('year', 'Year:', array('class' => 'form-spacing-top'))}}
            {{Form::text('year', null, array('class' => 'form-control')) }}    

            {{Form::label('duration', 'Duration:', array('class' => 'form-spacing-top'))}}
            {{Form::text('duration', null, array('class' => 'form-control')) }}                

            {{ Form::label('slug', 'Slug:', array('class' => 'form-spacing-top')) }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '2', 'maxlength' => '255') ) }}
        </div>

        <div class="col-md-6">
            {{ Form::label('category_id', 'Category:', array('class' => 'form-spacing-top')) }}
            <select class="form-control" name="category_id">
                @foreach($cats as $category)
                <option value='{{ $category->id }}'>{{ $category->category }}</option>
                @endforeach

            </select>

            {{ Form::label('language_id', 'Language:', array('class' => 'form-spacing-top')) }}
            <select class="form-control" name="language_id">
                @foreach($langs as $language)
                <option value='{{ $language->id }}'>{{ $language->language }}</option>
                @endforeach
            </select>

            {{ Form::label('fsk_id', 'Age:', array('class' => 'form-spacing-top')) }}
            <select class="form-control" name="fsk_id">
                @foreach($ages as $fsk)
                <option value='{{ $fsk->id }}'>{{ $fsk->fsk }}</option>
                @endforeach
            </select>
            
            {{ Form::label('image', 'Upload a Featured Image', array('class' => 'form-spacing-top')) }}
            {{ Form::file('image') }}
        </div>
        
        <div class="col-md-12">

            {{Form::label('description', 'Film description:', array('class' => 'form-spacing-top'))}}
            {{Form::textarea('description', null, array('class' => 'form-control', 'rows' => 8))}}                       

            {{Form::submit('Add the New Film', array('class' => 'button form-spacing-top btn-success btn-block separator-top-bottom')) }}
            {!! Form::close() !!}       
        </div>
        
    <div class="col-md-4">
        <div class="well">
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('films.show', 'Cancel', array($film->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>	<!-- end of .row (form) -->
</div>
@endsection
