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
                <p class="post-subtitle">
                   category: {{$post['category']}}
                </p>
            </a>
            <p class="post-meta">Posted by
                <a href="#">Start Bootstrap</a>
                on September 24, 2019</p>
        </div>
            <hr>
        @endforeach
        <div class="clearfix">
            {{ $posts->links() }}
            <a class="btn btn-secondary float-right" href="#">older posts</a>
        </div>


        <!-- Pager -->
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
    </div>
</div>
@endsection
