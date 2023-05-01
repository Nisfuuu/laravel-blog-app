@extends('layouts.app')

@section('title', "$post->title")

@section('content')
        <h1>{{ $post->title }}</h1>
        <small>
            <p>{{ $post->updated_at }} </p>
        </small>
        <br>
        <p>content: {{ $post->content }}</p>
        <br>
        <p>total comments: {{ $total_comments }}</p>
        @foreach ($comments as $comment )
    <figcaption class="blockquote-footer">
        {{ $comment->comment }}
      </figcaption>

    @endforeach
    <a href="{{ url("posts") }}">Back to posts</a>
  @endsection
