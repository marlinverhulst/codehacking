@extends('layouts.admin')

@section('content')
    <h1>Posts Indexpage</h1>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>category</th>
            <th>photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>View Post</th>
            <th>View Comments</th>
            <th>created</th>
            <th>Updated</th>
        </tr>
    @if($posts)
        @foreach ($posts as $post )

            <tr>
            <td>{{$post->id}}</td>
            <td><img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'No Category'}}</td>           
            <td>{{$post->title}}</td>
            <td>{{str_limit($post->body, 20)}}</td>
            <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
            <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
            
        @endforeach


    @endif

    </table>
@endsection