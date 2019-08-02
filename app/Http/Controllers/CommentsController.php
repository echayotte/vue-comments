<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        //decode base64 url parameter now to retrieve it
        return Comment::where('url', base64_decode($url))
            ->whereNull('respond_to_id')
            ->paginate(3);
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
        request()->validate([
            'name' => 'required | string',
            'body' => 'required | string',
            'url' => 'required | string',
        ]);

        /*  V1 = V2
            -------------------
            V1
            -------------------
            $comment = Comment::create([
                'author' => request('author'),
                'url' => request('url'),
                'content' => request('content'),
            ]);
            return $comment;

            -------------------
            V2
            -------------------
            return Comment::create([
                'author' => request('author'),
                'url' => request('url'),
                'content' => request('content'),
            ]);
        */
        return Comment::create([
            'respond_to_id' => request('respond_to_id'),
            'name' => request('name'),
            'url' => request('url'),
            'body' => request('body'),
            // as it is just one comment,
            // we need to specificly set relation to have it in vuejs
        ])->setRelation('children', collect());
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
        // dd($request);
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
