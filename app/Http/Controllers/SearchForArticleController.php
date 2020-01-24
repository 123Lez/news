<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourcesContentModel;
use App\SourcesModel;

class SearchForArticleController extends Controller 
{
    //
    public function search_article(Request $request)
    {
    	$data = $request->all();
    	$user_search_input = explode(" ", $data['search-text']);
    	$qry_result = "";
    	foreach ($user_search_input as $key => $value) 
    	{
    		if($value<>" " and strlen($value) > 0)
    		{
    			$qry_result .= "article_text LIKE '%$value%' or ";
    		}
    	}
    	$qry_result=substr($qry_result,0,(strlen($qry_result)-3));
 
    	$search_result = SourcesContentModel::whereRaw($qry_result)->paginate(9);
        // dd($search_result);
    	// return response()->json($search_result);
        return view('view_search')->with('search_result',$search_result);
    }

    public function showSource_content(Request $request)
    {
        $source = $request->all();
        $result = "";

         switch($source['source'])
        {
            case 'BBC':
                $data =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::BBC)->paginate(5);
                
                break;

            case 'CNN':
                $data =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::CNN)->paginate(5);
                break;

            case 'eNCA':
                $data =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::ENCA)->paginate(5);
                break;

            case 'SuperSport':
                $data =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::SUPERSPORT)->paginate(5);
                
                break;

            case 'ESPN':
                $data =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::ESPN)->paginate(5);
                
                break;
            case 'Zalebs':
                $data = SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::ZALEBS)->paginate(5);


        }
        // if(count($data) < 1)
        // {
        //     $result .=  "<div class='p-2 bd-highlight holder'>".
        //                 "No data found".
        //                 "</div>".
        //                 "</div>";
        // }
        // else
        // {
        //     foreach ($data as $value) 
        //     {
        //         $result .=  "<div class='p-2 bd-highlight holder'>".
        //                     "<div class='card img-container' id='img-holder'>".
        //                     "<div class='article-hover'>".
        //                     "<a href='{{$value->article_url}}' target='_blank'>".
        //                     "<img src='{{$value->top_image}}'>";
        //                     if(strlen($value->title) >= 45)
        //                     {
        //                         $article_title = substr($value->title,0,45). ' ...';
        //                     }
        //                     else
        //                     {
        //                         $article_title = $value->title;
        //                     }   
        //         $result .=  "<span class='article-title'>$article_title</span>".
        //                     "</a>".
        //                     "</div>".
        //                     "</div>";
        //  //                        '</div>';
        //     } 
        //     $result .= $data->appends(request()->query())->links();
        // }
        // return response()->json($result);
        return view('show_source')->with('data',$data);
    }
    public function showChoosen_source(Request $request)
    {
        $input = $request->all();
        return view('show_source');
    }
}
