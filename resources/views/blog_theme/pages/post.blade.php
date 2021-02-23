@extends('blog_theme/main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2>{{$post->title}}</h2>
            <p>{{$post->body}}</p>
        </div>

    </div>
    <div class="card-block">
    <form  action="/post/{{$post->id}}/comment" method="post">
        {{csrf_field()}}
    <div class="form-group" >
        <label for="exampleFormControlTextarea1">Add comment</label>
        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
    </form>
        </div>
    </div>
    <ul class="list-group">
       @foreach($post->comments  as $comment)
            <ul class="list-group-item"> <strong> {{$comment->created_at}}</strong> {{$comment->body}} </li>
        @endforeach
    </ul>

@endsection


