<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

    public function createTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Task.title' => 'required|string',
            'Task.des' => 'required|string',
        ]);

        // Validation failed
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed
        $inputTask = $request->input('Task');

        $task = DB::table('todo')->insert([
            'title' => $inputTask['title'],
            'description' => $inputTask['des'],
            'created_at' => Carbon::now()
        ]);

        return response()->json(['message' => 'Task created successfully'], 201);
    }

    public function  DeleteTask(Request $request,$id){



        // Validation failed


        // Validation passed
        $inputTask = $request->input('Task');

        $task = DB::table('todo')->where('id',$id)->update([
                'deleted_at' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Task delete successfully'], 201);
    }
    public function  view(){


        $task = DB::table('todo')->whereNull('deleted_at')->get();

        return response()->json(['data'=>$task,'message' => 'Task fetch successfully'], 201);
    }

    public function UpdateTask(Request $request,$id){
return $request;

        $validator = Validator::make($request->all(), [
            'Task.title' => 'required|string',
            'Task.des' => 'required|string',
        ]);

        // Validation failed
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed
        $inputTask = $request->input('Task');

        $task = DB::table('todo')->where('id',$id)->update([
            'title' => $inputTask['title'],
            'description' => $inputTask['des'],
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Task update successfully'], 201);
    }


    }


    //

