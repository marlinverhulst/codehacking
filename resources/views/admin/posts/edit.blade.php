@extends('layouts.admin')

@section('content')

    <h1>Posts Edit Page</h1>

    

    

    <div class="row">
        <div class="col-sm-3">
        <img height = "40" class="img-resposive" src="{{$post->photo->file}}" alt="">
        </div>
        <div class="col-sm-9">
        {!!Form::model($post,['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true])!!}
        <div class="form-group">

            {!!Form::label('title','Title')!!}
            {!!Form::text('title', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">

            {!!Form::label('category_id','Category')!!}
            {!!Form::select('category_id', $categories , null, ['class'=>'form-control'])!!}

        </div>


        <div class="form-group">

            {!!Form::label('photo_id','Photo:')!!}
            {!! Form::file('photo_id', null, ['class'=> 'form-control'])!!}


        </div>


        <div class="form-group">
            {!!Form::label('body','Description:')!!}
            {!!Form::textarea('body', null, ['class'=>'form-control',])!!}
        </div>

        <div class="form-group">

            {!!Form::submit('Update Post',['class'=>'btn btn-primary col-sm-6'])!!}

        </div>
        {!!Form::close() !!}
        <div class="form-group">
        {!!Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]])!!}
        {!!Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])!!}
        {!!Form::close()!!}
        </div>
        </div>

    </div>

    @include('includes.form_error')



@endsection