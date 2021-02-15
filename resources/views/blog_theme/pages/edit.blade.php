
@extends('blog_theme/main')
@section('content')
    <div class="row justify-content-center mb-5">
        <h2>New Post</h2>
    </div>
    @include('blog_theme/_partials/errors')
    <form action="/storeupdate/{{$post->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="input-group">
            <input name="title" type="text" placeholder="Name.." value="{{$post->title}}" class="form-control" aria-label="Text input with dropdown button" >
            <div class="input-group-append"></div>
        </div>


        <select name="category" class="mt-3 form-control form-control-lg">
            @foreach($cate as $catt)
                <option value={{$catt->catName}}>{{$catt->catName}}</option>
            @endforeach
        </select>




        <div class="mt-4 form-group">
            <textarea  name="body" class="form-control" id="content" rows="5">{{$post->body}}</textarea>
        </div>
        <div><img src="{{asset($post->img)}}"></div>
        <div class="form-group">
            <input name="img" type="file"  class="form-control" id="upload">
        </div>

        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" class="btn btn-secondary">Post</button>
        </div>
    </form>
@endsection
