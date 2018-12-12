@extends('layouts.admin')

@section('content')



@if(count($comments) > 0)

<h1>Comments</h1>

    <table class="table">
        <th>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            
            </tr>
        </th>
        <tbody>
        @foreach ($comments as $comment )
            
        
            <tr>

            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post',$comment->post->id)}}">view post</a></td>  
            <td>
                @if ($comment->is_active == 1)

                 {!!Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id ]])!!}
                                            
                                            <input type="hidden" name="is_active" value="0">
                                                                        
                                             <div class="form-group">
                                                 
                                                 {!!Form::submit('Un-approve',['class'=>'btn btn-info'])!!}
                                                 
                                             </div>
                 {!!Form::close() !!}  
                 
                @else
                 
                {!!Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id ]])!!}
                                            
                <input type="hidden" name="is_active" value="1">
                                            
                 <div class="form-group">
                     
                     {!!Form::submit('Approve',['class'=>'btn btn-success'])!!}
                     
                 </div>
                    {!!Form::close() !!}  
                
                @endif
            </td>
            <td>
                    {!!Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id ]])!!}
                                            
                    
                                                
                     <div class="form-group">
                         
                         {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                         
                     </div>
                    {!!Form::close() !!}  
            </td>  
            </tr>

        @endforeach    
        </tbody>    
       


    
    </table>



    
@else

<h1 class="text-center">No Comments Available</h1>
    
@endif

     

     
@endSection()

