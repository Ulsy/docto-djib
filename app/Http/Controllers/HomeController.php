<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Specialization;


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
        return view('home');
    }
    public function showListMedecin()
    {
        // return response()->json([
        //     'doctors' => Specialization::orderBy('created_at', 'desc')->with('user:id,name,number,email') ->get()
        // ], 200);
        $doctors = User::join('specializations', 'users.id', '=', 'specializations.user_id')
                ->select('users.*', 'users.*', 'specializations.*')
                ->get();

        return response()->json([
            'doctors' => $doctors,
            'message' =>'success',
        ]);
    }
}
