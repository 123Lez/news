<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourcesContentModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = SourcesContentModel::orderBy('id','desc')->paginate(9);
        return view('home')->with('data',$data);
    }
    public function viewArticle($id)
    {
        $article_data = SourcesContentModel::where('id',$id)->get();
        // dd($article_data);
        return view('articleview')->with('articles',$article_data);
    }
}
