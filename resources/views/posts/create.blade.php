@extends('layouts.app')

@section('title', 'buat postingan')

@section('content')
    <h1>Create Blog</h1>
        <form method="POST" action="{{ url('posts') }}" class="form-control">
            @csrf
    <div class="mb-3">
        <label for="ini-title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="ini-title" name="title">
      </div>
      <div class="mb-3">
        <label for="ini-content" class="form-label">Content</label>
        <textarea class="form-control" id="ini-content" rows="3" name="content"></textarea>
      </div>
      <button class="btn btn-primary">Save</button>
    </form>

@endsection
