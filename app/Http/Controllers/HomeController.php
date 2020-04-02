<?php

namespace App\Http\Controllers;
use App\Memory;
use Illuminate\Http\Request;

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
    {   $memories = Memory::where('user_id', auth()->user()->id)->paginate(5);
        return view('home', compact('memories'));
    }
}
