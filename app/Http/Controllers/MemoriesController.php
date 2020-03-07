<?php

namespace App\Http\Controllers;

use App\Memories;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\Http\Requests\MemorySaveRequest;

class MemoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $memories = auth()->user()->savedMemories();
      return view('memories.index', compact('memories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemorySaveRequest $request)
    {
      $requestData = $request->all();
      $image_name = $request->file('image')->getRealPath();
      Cloudder::upload($image_name, null);
      $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => 250, "height"=>250]);
      // $image = file_get_contents($path);
      // $base64 = base64_encode($image);
      $requestData['image'] = $image_url;
      auth()->user()->memories()->create($requestData);
      
      return redirect('/memories')->with('success','Memory Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function show(memories $memories)
    {
      if (Gate::allows('show-or-edit-memory', $memories)) {
        // The current user can show the memory...
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function edit(memories $memories)
    {
      if (Gate::allows('show-or-edit-memory', $memories)) {
        // The current user can edit the memory...
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, memories $memories)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function destroy(memories $memories)
    {
        //
    }
}
