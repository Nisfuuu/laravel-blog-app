<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        // membaca data dari mysql
        $posts = Post::active()
            ->get();

        // semua data yang ada di mysql table posts dimasukan ke dalam variable $data
        $datas = [
            'posts' => $posts
        ];

        return view('posts.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // menampung name="title" dan name="content" file create di dalam form ke variabel
        $title = $request->input('title');
        $content = $request->input('content');

        // menambahkan data ke mysql ketika mengisi form
        Post::create([
            'title' => $title,
            'content' => $content,
            'active' => true,

        ]);

        // mengembalikan ke halaman post ketika sudah di create
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // baca data dari models ke mysql dan where akan melakukan filtering yg di inginkan user dan method first menampilkan data yang pertamakali
        $post = Post::where('id', $id)->first();
        $comments = $post->comments()->get();
        $total_comments = $post->total_comments();

        // tampung semua data
        $view_data = [
            'post' => $post,
            'comments' => $comments,
            'total_comments' => $total_comments,
        ];

        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // baca data dari models ke mysql dan where akan melakukan filtering yg di inginkan user dan method first menampilkan data yang pertamakali
        $post = Post::where('id', $id)->first();



        // tampung semua data
        $view_data = [
            'post' => $post
        ];

        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // menampung name="title" dan name="content" file create di dalam form ke variabel
        $title = $request->input('title');
        $content = $request->input('content');

        // mengupdate data bedasarkan id ketika user mengklik button form
        Post::where('id', $id) //key & value (default ==)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)
            ->delete();
        return redirect("posts");
    }
}
