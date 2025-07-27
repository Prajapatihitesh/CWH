<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::get();
        return view('admin.manageLanguage', compact('languages'));
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
        $count = Language::whereName($request->name)->count();
        if ($count == 0) {
            Language::create(["name" => $request->name]);
            return response()->json([
                'message' => 'Language are stored.',
                'icon' => 'success'
            ], 200);
        }
            return response()->json([
                'message' => 'Language are Already stored.',
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
        $language = Language::find($id);
        if (!$language) {
            return response()->json([
                'message' => 'Language not found.',
                'icon' => 'error'
            ], 404);
        }
        return response()->json([
            $language
        ], 200);
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
        $language = Language::find($id);
        if (!$language) {
            return response()->json([
                'message' => 'Language not found.',
                'icon' => 'error'

            ], 200);
        }
        $language->update(['name'=>$request->name]);
        return response()->json([
            'message' => 'Language successfully Updated.',
            'icon' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if (!$language) {
            return response()->json([
                'message' => 'Language not found.',
                'icon' => 'error'

            ], 404);
        }
        try {
            $language->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Language Associated with Topics.',
                'icon' => 'info'
            ], 200);
        }

        return response()->json([
            'message' => 'Language successfully deleted.',
            'icon' => 'success'
        ], 200);
    }
}
