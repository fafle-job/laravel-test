<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Request;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function employers() {

        $employers = User::where('group', 'employer')
               ->orderBy('name', 'ASC')
               ->get();
        return $employers;
    }
}
