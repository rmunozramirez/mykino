@extends('layout')

@section('title', "| Add a film")


@section('content')
<section id="content">        
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                    {!! Form::open(array('route' => 'films.store', 'data-parsley-validate' => '', 'files' => true)) !!}           
                    <h1> {{Form::label('name', 'Add a film name', array('class' => 'form-spacing-top'))}}
                    {{Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}
                    </h1> 
            </div>
                <div class="col-md-6">

                    {{Form::label('trailer', 'Trailer link:', array('class' => 'form-spacing-top'))}}
                    {{Form::text('trailer', null, array('class' => 'form-control')) }}
                    
                    {{Form::label('year', 'Year:', array('class' => 'form-spacing-top'))}}
                    {{Form::text('year', null, array('class' => 'form-control date')) }}    
                    
                    {{Form::label('duration', 'Duration:', array('class' => 'form-spacing-top'))}}
                    {{Form::text('duration', null, array('class' => 'form-control')) }}                

                    {{ Form::label('slug', 'Slug:', array('class' => 'form-spacing-top')) }}
                    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '2', 'maxlength' => '255') ) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('category_id', 'Category:', array('class' => 'form-spacing-top')) }}
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->category }}</option>
                        @endforeach

                    </select>
                    
                    {{ Form::label('language_id', 'Language:', array('class' => 'form-spacing-top')) }}
                    <select class="form-control" name="language_id">
                        @foreach($languages as $language)
                        <option value='{{ $language->id }}'>{{ $language->language }}</option>
                        @endforeach
                    </select>
                    
                    {{ Form::label('fsk_id', 'Age:', array('class' => 'form-spacing-top')) }}
                    <select class="form-control" name="fsk_id">
                        @foreach($fsks as $fsk)
                        <option value='{{ $fsk->id }}'>{{ $fsk->fsk }}</option>
                        @endforeach
                    </select>
                    
                    {{ Form::label('image', 'Upload a Featured Image', array('class' => 'form-spacing-top')) }}
                    {{ Form::file('image') }}
                </div>
                <div class="col-md-12">
                    {{Form::label('description', 'Film description:', array('class' => 'form-spacing-top'))}}
                    {{Form::textarea('description', null, array('class' => 'form-control', 'rows' => 6))}}                       
                        
                    {{Form::submit('Add the New Film', array('class' => 'button form-spacing-top btn-success btn-block separator-top-bottom')) }}
                    {!! Form::close() !!}       
                </div>
  
        </div>
    </div>
</section>



@endsection
