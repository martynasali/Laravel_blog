
@extends('blog_theme/main')
@section('content')
    <div class="row justify-content-center mb-5">

    </div>
    @include('blog_theme/_partials/errors')

        {{csrf_field()}}
        {{method_field('PATCH')}}

<h1> {{$category}}</h1>



    @foreach($posts as $post)
        @if($post->category == $category)
        <hr>
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">
                    {{$post['title']}}
                </h2>
                <h3 class="post-subtitle">
                    {{ substr($post['body'], 0,  70) }}..
                </h3>
                <a href="post/{{$post->id}}">skaityti daugiau</a>

                <p class="post-subtitle">
                    <a href="/byCategory/{{$post->category}}"> category: {{$post['category']}}</a>
                </p>
            </a>
            <p class="post-meta">Created
                <a href="#">{{$post->created_at}}</a>
                <a href="/edit/{{$post->id}}">redaguoti</a>
                <a href="/delete/{{$post->id}}">šalinti</a>
            </p>
        </div>
        <hr>
        @endif
    @endforeach


@endsection
