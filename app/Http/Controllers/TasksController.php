<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Tasks;
use Request;

class TasksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::guard('api')->user()->group == 'manager') {
            $tasks = Tasks::paginate(3);
        } else {
            $tasks = Tasks::where('user_id', Auth::guard('api')->user()->id)->paginate(3);
        }
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $task = Tasks::create(Request::all());
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $task = Tasks::find($id);
        $task->status = Request::input('status') ? 'closed' : 'open';
        $task->save();

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Tasks::destroy($id);
    }

}
