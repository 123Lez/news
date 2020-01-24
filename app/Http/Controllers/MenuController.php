<?php

namespace App\Http\Controllers;
use App\SourcesModel;
use App\SourcesContentModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function fetchchoosenArticle($source)
    {
        // $input = $request->all();

        switch($source)
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


        }
        
        return view('view')->with('data',$data);
        
    }
}
