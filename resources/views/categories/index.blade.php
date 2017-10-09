@extends('main')
@section('title','| Categories')
@section('content')
    <h2 class="title">Categories</h2>
    <table class="highlight striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'DELETE','id'=>'form-delete']) !!}
                    <a class="fa fa-trash-o fa-2x right btn-floating btn-small waves-effect waves-light red data-delete tooltipped" style="margin-left: 5px" data-position="right" data-tooltip="Delete this category" data-delay="0"></a>
                    {!! Html::linkRoute('categories.edit',"",array($category->id),array('class'=>'fa fa-pencil fa-2x right btn-floating btn-small waves-effect waves-light green tooltipped','data-tooltip'=>'Edit this category','data-position'=>'right','data-delay'=>'0')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="center">
        {!! (new Landish\Pagination\Materialize($categories))->render() !!}
    </div>
    <hr>
    <div>
        <h5 class="title">New category</h5>
        {!! Form::open(array('route'=>'categories.store','data-parsley-validate'=>'')) !!}
        <div class="input-field">
            {{ Form::text('name',null,array(
                'id'=>'name',
                'class'=>'darken-4',
                'required'=>'',
            )) }}
            {{ Form::label('name','Name',array('for'=>'name','class'=>'darken-4')) }}
        </div>
        <div>
            <a>{{ Form::submit('Create category',array('class'=>'btn waves-effect waves-light btn-primary right inline spaceBottom')) }}</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            $('.data-delete').on('click', function (e) {
                if (!confirm('Are you sure you want to delete this category?')) return;
                e.preventDefault();
                $('#form-delete').submit();
            });
        })
    </script>
@endsection