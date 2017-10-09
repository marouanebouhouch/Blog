@extends('main')
@section('title','| Add a new post')
@section('content')
<h2 class="title">Add a post</h2>
@if(!empty($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
{!! Form::open(array('route'=>'posts.store')) !!}
    <div class="input-field">
        {{ Form::text('title',null,array(
            'id'=>'password',
            'class'=>'darken-4',
        )) }}
        {{ Form::label('title','Title',array('for'=>'password','class'=>'darken-4')) }}
    </div>
    <div class="input-field ">

    </div>
    <div class="input-field">
        {{ Form::textarea('body',null,array(
            'id'=>'body',
            'class'=>'materialize-textarea darken-4',
        )) }}
        {{ Form::label('body','Body',array('for'=>'body')) }}
    </div>
    <div class="input-field">
        {{ Form::select('categories[]',$categories,null,['class'=>'material_select','multiple'=>'multiple']) }}
        {{ Form::label('categories','Categories') }}
    </div>
    <div>
        <a>{{ Form::submit('Create post',array('class'=>'btn waves-effect waves-light btn-primary right inline spaceBottom')) }}</a>
    </div>
{!! Form::close() !!}
@endsection