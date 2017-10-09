@extends('main')
@section('title','| Posts')
@section('content_post')
<h2 class="title">Posts</h2>
<table class="highlight striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th>Categories</th>
            <th>Date publish</th>
            <th>Last update</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr onclick="document.location = '/posts/{{$post->id}}';" class="clickable">
            <td>{{$post->title}}</td>
            <td class="overflowHiden">{{$post->body}}</td>
            <td>
                <ul>
                @foreach($post->categories()->get() as $category)
                     <li>{{$category->name}}</li>
                @endforeach
                </ul>
            </td>
            <td><i>{{$post->created_at->format('d-m-Y H:i')}}</i></td>
            <td><i>{{$post->updated_at->format('d-m-Y H:i')}}</i></td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="center">
    {!! (new Landish\Pagination\Materialize($posts))->render() !!}
</div>
<div class="fixed-action-btn" style="top: 63px; right: 14px;" title="I am tooltip" >
    <a class="btn-floating btn-large red accent-1 tooltipped" data-position="left" data-tooltip="Add a new post" data-delay="0"  href="{{route('posts.create')}}">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </a>
</div>
@endsection