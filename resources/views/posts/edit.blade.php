<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>{{ $post->title }}</title>

</head>
<body>
    <div class="container">
    <h1>Ini Create</h1>
        <form method="POST" action="{{ url("posts/$post->id") }}" class="form-control">
            @method('PATCH')
            @csrf
    <div class="mb-3">
        <label for="ini-title" class="form-label">Email address</label>
        <input type="text" class="form-control" id="ini-title" name="title" value="{{ $post->title }}">
      </div>
      <div class="mb-3">
        <label for="ini-content" class="form-label">Example textarea</label>
        <textarea class="form-control" id="ini-content" rows="3" name="content" >{{ $post->content }}</textarea>
      </div>
      <button class="btn btn-primary">Simpan</button>
    </form>
    <form method="POST" action="{{ url("posts/$post->id") }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
