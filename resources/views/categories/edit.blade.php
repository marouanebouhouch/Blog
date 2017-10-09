@extends('main')
@section('title','| Edit a categorie')
@section('content')
    <h2 class="title">Edit a categorie</h2>
    {!! Form::model($category,array('route'=>array('categories.update',$category->id),'method' => 'PUT','data-parsley-validate'=>'')) !!}
    <div class="input-field">
        {{ Form::text('name',null,array(
            'id'=>'name',
            'class'=>'darken-4',
            'required'=>'',
        )) }}
        {{ Form::label('name','Name',array('for'=>'name','class'=>'darken-4')) }}
    </div>
    <div>
        <a>{{ Form::submit('Update categorie',array('class'=>'btn waves-effect waves-light')) }}</a>
    </div>
    {!! Form::close() !!}
@endsection


