@extends('layouts.app')

@section('title', 'ubah postingan')

@section('content')
    <h1>Edit</h1>
        <form method="POST" action="{{ url("posts/$post->id") }}" class="form-control">
            @method('PATCH')
            @csrf
    <div class="mb-3">
        <label for="ini-title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="ini-title" name="title" value="{{ $post->title }}">
      </div>
      <div class="mb-3">
        <label for="ini-content" class="form-label">Content</label>
        <textarea class="form-control" id="ini-content" rows="3" name="content" >{{ $post->content }}</textarea>
      </div>
      <button class="btn btn-primary">Save</button>
      <form method="POST" action="{{ url("posts/$post->id") }}">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </form>

@endsection
