@extends('main')
@section('title','| Edit a post')
@section('content')
    <h2 class="title">Edit a post</h2>
    {!! Form::model($post,array('route'=>array('posts.show',$post->id),'method' => 'PUT','data-parsley-validate'=>'')) !!}
    <div class="input-field">
        {{ Form::text('title',null,array(
            'id'=>'password',
            'class'=>'darken-4',
            'required'=>'',
        )) }}
        {{ Form::label('title','Title',array('for'=>'password','class'=>'darken-4')) }}
    </div>

    <div class="input-field">
        {{ Form::textarea('body',null,array(
            'id'=>'body',
            'class'=>'materialize-textarea darken-4',
            'required'=>'',
            'minlength'=>'5'
        )) }}
        {{ Form::label('body','Body',array('for'=>'body')) }}
    </div>
    <div class="input-field">
        {{ Form::select('categories[]',$categories,null,['class'=>'material_select','multiple'=>'multiple']) }}
        {{ Form::label('categories','Categories') }}
    </div>
    <div>
        <a>{{ Form::submit('Update post',array('class'=>'btn waves-effect waves-light')) }}</a>
    </div>
    {!! Form::close() !!}
@endsection


