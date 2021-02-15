@extends('blog_theme/main')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">



            @foreach($posts as $post)
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
                <div><img src="{{asset($post->img)}}"></div>
                <p class="post-subtitle">
                    <a href="/byCategory/{{$post->category}}"> category: {{$post['category']}}</a>
                </p>
            </a>

                <p>Created by: {{$user[0]['name']}}</p>

            <p class="post-meta">Created
                <a href="#">{{$post->created_at}}</a>

            @if (Auth::check())
                    <a href="/edit/{{$post->id}}">redaguoti</a>
                    <a href="/delete/{{$post->id}}">šalinti</a>
            @endif


                </p>
        </div>
            <hr>
        @endforeach


                {{ $posts->links() }}
        <div class="clearfix">

            <a class="btn btn-secondary float-right" href="#">older posts</a>
        </div>
        <!-- Pager -->
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
    </div>
</div>
@endsection
