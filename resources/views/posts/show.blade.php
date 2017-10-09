@extends('main')
@section('title',"| Post : $post->title")
@section('content')
    {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE','style'=>'margin-top:5px','id'=>'form-delete']) !!}
    <a class="fa fa-trash-o fa-2x right btn-floating btn-sm waves-effect waves-light red data-delete tooltipped" style="margin-left: 5px" data-position="bottom" data-tooltip="Delete this post" data-delay="0"></a>
    {!! Html::linkRoute('posts.edit',"",array($post->id),array('class'=>'fa fa-pencil fa-2x right btn-floating btn-sm waves-effect waves-light green tooltipped','data-tooltip'=>'Edit this post','data-position'=>'bottom','data-delay'=>'0')) !!}
    {!! Form::close() !!}
    <h2 class="title">{{$post->title}}</h2>
    <p class="flow-text" style="display: block">{{$post->body}}</p>

    @foreach($post->categories as $category)
        <div class="rightDiv"><p class="teal-text">{{$category->name}}</p></div>
    @endforeach
    <div class="rightDiv"><p class=" teal-text"><i><b>Created : </b>{{$post->created_at->format('d/m/Y H:m')}}</i></p></div>
    <div class="rightDiv"><p class=" teal-text"><i><b>Updated : </b>{{$post->updated_at->format('d/m/Y H:m')}}</i></p></div>
@endsection
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            $('.data-delete').on('click', function (e) {
                if (!confirm('Are you sure you want to delete this post?')) return;
                e.preventDefault();
                $('#form-delete').submit();
            });
        })
    </script>
@endsection