<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourcesContentModel;

class MainpageController extends Controller
{
    //If there are duplicates of the article remove from database
    private function remove_duplicates($title)
    {
        $dontDeleteThisRow = SourcesContentModel::where('title',$title)->first();
        $title_duplicate = SourcesContentModel::where('title',$title)->where('id','!=', $dontDeleteThisRow->id)->delete();

        // if(count($title_duplicate) > 1)
        // {
        //     return "Has duplicates";
        // } 
        // else
        // {
        //     return "Has No duplicates";
        // }
    }
    public function fetchArticles(Request $request)
    {


    	$data = SourcesContentModel::orderBy('id','desc')->paginate(9);
        // dd($data);
        // foreach($data as $value)
        // {
        //    $this->remove_duplicates($value['title']);
        // }
    	return view('mainpage')->with('data',$data);
    }
    
    public function viewArticle($id)
    {
    	$article_data = SourcesContentModel::where('id',$id)->get();
    	// dd($article_data);
        // $images_substring= substr($article_data[0]->all_images,2,strlen($article_data[0]->all_images)-3);
        // $all_image_array = explode(',', $images_substring);

    	return view('articleview')->with('articles',$article_data);
    }
   
}
