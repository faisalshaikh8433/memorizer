<?php

namespace App\Http\Controllers;

use Gate;
use App\Memory;
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
      $memories = Memory::where('user_id', auth()->user()->id)->paginate(5);
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
      $requestData['image'] = $image_url;
      auth()->user()->memories()->create($requestData);
      
      return redirect('/memories')->with('success','Memory Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\memory  $memory
     * @return \Illuminate\Http\Response
     */
    public function show(Memory $memory)
    {
      if (Gate::allows('owns-memory', $memory)) {
        // The current user can show the memory...
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\memory  $memory
     * @return \Illuminate\Http\Response
     */
    public function edit(Memory $memory)
    {
      if (Gate::allows('owns-memory', $memory)) {
        // The current user can edit the memory...
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\memory  $memory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memory $memory)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\memory  $memory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memory $memory)
    {
        if (Gate::allows('owns-memory', $memory)) {
          $publicId = pathinfo($memory->image)['filename'];
          Cloudder::destroyImage($publicId);
          $memory->delete();
          return redirect('/memories')->with('notice', 'Memory deleted!');
        }
    }
}
