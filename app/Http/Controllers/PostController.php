<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $posts = Storage::get('posts.txt');
        $posts = explode("\n", $posts);

        $data = [
            'posts' => $posts
        ];
        return view('posts.index', $data);
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

        // mengambil data dari post.txt
        $posts = Storage::get('posts.txt');
        // memisahkan data dengan enter dari file post.txt
        $posts = explode("\n", $posts);

        // menampung / membuat data baru
        $new_post = [
            count($posts) + 1,
            $title,
            $content,
            date('Y-m-d H:i:s')
        ];
        // mengembalikan data array yang di pisah dengan koma menjadi satu seperti awal
        $new_post = implode(',', $new_post);

        // menambahkan data ke dalam array dengan push
        array_push($posts, $new_post);
        // mengembalikan array dengan pemisah enter menjadi string seperti semula
        $posts = implode("\n", $posts);

        // menambahkan data yang telah di buat ke dalam file post.txt
        Storage::write('posts.txt', $posts);

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
        $posts = Storage::get('posts.txt');
        $posts = explode("\n", $posts);
        $selected_post = array();
        foreach ($posts as $post) {
            $post = explode(",", $post);
            if ($post[0] == $id) {
                $selected_post = $post;
            }
        }

        $view_data = [
            'post' => $selected_post
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
