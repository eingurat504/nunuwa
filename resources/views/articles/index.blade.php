@extends('layouts.app')

@section('content')
<div class="blog-posts bg-light pt-4 pb-7">
    <div class="container">
        <h2 class="title">From Our Blog</h2>

        <div class="owl-carousel owl-simple" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "items": 3,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "600": {
                        "items":2
                    },
                    "992": {
                        "items":3
                    },
                    "1280": {
                        "items":4,
                        "nav": true, 
                        "dots": false
                    }
                }
            }'>
            @foreach($articles as $article) 
            <article class="entry">
                <figure class="entry-media">
                    <a href="#">
                        <img src="{{ asset('images/demos/demo-13/blog/post-1.jpg') }}" alt="image desc">
                    </a>
                </figure>

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">{{ $article->created_at }}</a>, 0 Comments
                    </div>

                    <h3 class="entry-title">
                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title}}</a>
                    </h3>

                    <div class="entry-content">
                        <p>{{ $article->description }}.</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="read-more">Read More</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endsection

