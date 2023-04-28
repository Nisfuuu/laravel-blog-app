<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Blog App</h1>
        <a href="{{ url("posts/create") }}" class="btn btn-success">+ create</a>
        @foreach ($posts as $post)
        {{-- memisahkan kata dengan koma dan menjadi index array --}}
        @php($post = explode(",", $post))
        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">{{ $post[1] }}</h5>
              <p class="card-text"> {{ $post[2] }}</p>
              <p class="card-text"><small class="text-body-secondary">Last updated at
                 {{-- mengkonfersi tanggal dan string menjadi intejer --}}
                {{ date("d M Y H:i", strtotime($post[3])) }}</small>
            </p>
            {{-- menuju halaman posts berdasarkan id yang di klik --}}
            <a class="btn btn-primary" href="{{ url("posts/$post[0]") }}" role="button">Detail</a>
            </div>
          </div>
        @endforeach

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
