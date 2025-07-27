<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Language;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::get();
        return view('admin.manageTopic',compact('languages'));
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
        $count = Topic::whereName($request->name)->whereLanguageId($request->languageId)->count();
        if ($count == 0) {
            Topic::create(["name" => $request->name,"language_id"=>$request->languageId]);
            return response()->json([
                'message' => 'Topic are stored.',
                'icon' => 'success'
            ], 200);
        }
            return response()->json([
                'message' => 'Topic are Already stored.',
                'icon' => 'error'

            ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $languages = Language::get();
        $topics = Topic::whereLanguageId($id)->get();
        return view('admin.manageTopic',compact('languages','topics','id'));
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
        $topic = Topic::find($id);
        if (!$topic) {
            return response()->json([
                'message' => 'Topic not found.',
                'icon' => 'error',
                'id'=>$id

            ], 404);
        }
        try {
            $topic->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Topic Associated with Sub Topics.',
                'icon' => 'info',
                'id'=>$id
            ], 200);
        }

        return response()->json([
            'message' => 'Topic successfully deleted.',
            'icon' => 'success',
            'id'=>$id
        ], 200);
    }
}
