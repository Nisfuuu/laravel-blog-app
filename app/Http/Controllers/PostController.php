<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // membaca data dari mysql
        $posts = DB::table('posts')->select('id', 'title', 'content', 'created_at', 'updated_at')
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
        DB::table('posts')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
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
        // baca data dari mysql dan where akan melakukan filtering yg di inginkan user dan method first menampilkan data yang pertamakali
        $post = DB::table('posts')->select('id', 'title', 'content', 'created_at', 'updated_at')
            ->where('id', '=', $id)->first();



        // tampung semua data
        $view_data = [
            'post' => $post
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
        // baca data dari mysql dan where akan melakukan filtering yg di inginkan user dan method first menampilkan data yang pertamakali
        $post = DB::table('posts')->select('id', 'title', 'content', 'created_at', 'updated_at')
            ->where('id', '=', $id)->first();



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
        DB::table('posts')
            ->where('id', $id) //key & value (default ==)
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
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect("posts");
    }
}
