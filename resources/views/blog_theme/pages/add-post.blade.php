
@extends('blog_theme/main')
@section('content')
    <div class="row justify-content-center mb-5">
        <h2>New Post</h2>
    </div>
    @include('blog_theme/_partials/errors')
    <form action="/store" method="post">
        {{csrf_field()}}
    <div class="input-group">
        <input name="title" type="text" placeholder="Name.." class="form-control" aria-label="Text input with dropdown button" >
        <div class="input-group-append"></div>
    </div>



        <select name="category" class="mt-3 form-control form-control-lg">
            @foreach($cate as $catt)
            <option value={{$catt->catName}}>{{$catt->catName}}</option>
            @endforeach
        </select>



        <div class="mt-4 form-group">
            <textarea name="body" placeholder="Write your post here.." class="form-control" id="content" rows="5"></textarea>
        </div>

        <div class="form-group">
            <input name="img" type="file"  class="form-control" id="upload">
        </div>

        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" class="btn btn-secondary">Post</button>
        </div>
    </form>
@endsection
