
@extends('blog_theme/main')
@section('content')
    <div class="row justify-content-center mb-5">
        <h2>New Post</h2>
    </div>
    @include('blog_theme/_partials/errors')
    <form action="/addCat" method="post">
        {{csrf_field()}}
        <div class="input-group">
            <input name="catName" type="text" placeholder="new category.." class="form-control" aria-label="Text input with dropdown button" >
            <div class="input-group-append"></div>
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" class="btn btn-secondary">Post</button>
        </div>
    </form>
@endsection
