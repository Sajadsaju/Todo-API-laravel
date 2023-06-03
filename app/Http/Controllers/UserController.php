<?php

namespace App\Http\Controllers;
use Carbon;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createTask(Request $request){
        $inputTask = $request['Task']; // Input data

        $task = DB::table('todo')->insert([
            'title'=>$inputTask['title'],
            'description'=>$inputTask['des'],
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }

    //
}
