<?php

namespace App\Http\Controllers;

use App\Models\Article; //gunakan model terlebih dahulu
use Illuminate\Http\Request;
use Illuminate\Support\Str; //helper untuk slug
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    //my firts method
    public function index()
    {
        // $dataArticle = [
        //     ['title' => 'article1', 'deskripsi' => 'lorem ip sum'],
        //     ['title' => 'article2', 'deskripsi' => 'lorem ip sum'],
        //     ['title' => 'article3', 'deskripsi' => 'lorem ip sum']
        // ];

        //$dataArticle = Article::all(); //ini adalah cara mengambil semua database dari modelnya model Artcle

        //$dataArticle = Article::paginate(5); //menampilkan 5 datanya saja atau pagiantion
        $active = 'Article';
        $dataArticle = Article::orderBy('id', 'desc')->paginate(6);
        $htmltitle = 'Halaman Pertama';
        return view('article.langkahPertama', compact('dataArticle', 'htmltitle', 'active'));
    }

    public function show($slug) //menangkap variable yang dikim oleh routes
    {
        $htmltitle = "See Detail";
        $active = '';
        $article = Article::where('slug', $slug)->first(); //ambil yang pertama keluar
        //cek apakah slug tersedia
        if ($article == null)
            abort(404);
        //die($slug);
        //return view('singel', ['title' => $slug]);

        return view('article.singel',  compact('article', 'htmltitle', 'active'));
        // view('artice.single', compact('title', ['action' => action]))
        // akan langsung memberitahu  bahwa slug
        //yg dimaksud adalahslug yang di parameter
    }

    public function create()
    {
        $active = 'Create';
        $htmltitle = 'Create a new article';
        return view('article.create', compact('htmltitle', 'active'));
    }

    public function store(Request $request)
    {
        //dd($request->thumbnail);
        //validasi
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg',
            'subject' => 'required|min:10'
        ]);
        if ($request->thumbnail == null) {
            $imgName = 'default.jpg';
        } else {
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }


        //dd($request);
        // $article = new Article; //intance model atau ambil object dari modelnya
        // $article->title = $request->title;
        // $article->subject = $request->subject;
        // $article->save();

        //diganti menggunakan mass assigment
        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]); //jadi jika menggunakna mass assigment tidak harus menggunakan $article->save()

        return redirect('/article');
    }

    public function edit($id)
    {
        $htmltitle = 'Edit Article';
        $active = '';
        $article = Article::find($id); //cari data berdasarkan id
        return view('article.edit', compact('article', 'htmltitle', 'active'));
    }

    public function update(Request $request, $id) //menggunakan method request karena
    //ada data yang dikirim dari form
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'subject' => 'required|min:10',
            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);
        $imgName = null;
        if ($request->thumbnail) {
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }

        // $article = Article::find($id); //bedanya dengan tambah dia ada id nya 
        // //sehingga menginisialisasi bahwa ini adalah update
        // $article->title = $request->title;
        // $article->subject = $request->subject;
        // $article->save();
        Article::find($id)->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);

        return redirect('/article');
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/article');
    }
}
