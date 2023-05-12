@extends('layouts.app')

@section('title', 'blog')

@section('content')
        <h1>Blog App</h1>
        <a href="{{ url("posts/create") }}" class="btn btn-success mb-2">+ create</a>
        @foreach ($posts as $post)
        {{-- memisahkan kata dengan koma dan menjadi index array --}}

        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p class="card-text"> {{ $post->content }}</p>
              <p class="card-text"><small class="text-body-secondary">Last updated at
                 {{-- mengkonfersi tanggal dan string menjadi intejer --}}
                {{ date("d M Y H:i", strtotime($post->created_at)) }}</small>
            </p>
            {{-- menuju halaman posts berdasarkan id yang di klik --}}
            <a class="btn btn-primary" href="{{ url("posts/$post->id") }}" role="button">Detail</a>
            <a class="btn btn-warning" href="{{ url("posts/$post->id/edit") }}" role="button">Edit</a>
            </div>
          </div>
        @endforeach

@endsection
