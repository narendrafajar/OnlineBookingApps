<?php

namespace App\Http\Controllers\ForUser;

use App\Http\Controllers\Controller;
use App\Models\Treatments;
use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        // dd($user);
        if($user->role == 'superadmin'){
            // $feed = $this->getBeautyArticles();
            return view('admin-page.home.index');
        } else {
            $feed = $this->getBeautyArticles();
            return view('user-page.home.home',['feed'=>$feed]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatments $treatments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatments $treatments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Treatments $treatments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatments $treatments)
    {
        //
    }

    public function getBeautyArticles()
    {
        $client = New Client();
        $crawler = $client->request('GET','https://www.popbela.com/beauty');
        
        $articles = $crawler->filter('section[data-testid="section-headline"] div.css-0 a.css-ps0b2c')->each(function ($node) {
            // dd($node);
            $article = [];
            $article['title'] = $node->filter('img')->attr('alt'); // Mengambil teks judul
            $article['link'] = $node->link()->getUri(); // Mengambil URL artikel
            $article['image'] = $node->filter('img')->attr('src'); // Mengambil URL gambar
            
            return $article;
        });
        // dd($articles);
        return $articles;
    }
}
