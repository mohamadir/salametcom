<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    //
    public function register(Request $request) {
        $user = new User();
        $user->is_admin = $request->role == 'admin' ? true : false;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->position = $request->position;
        $user->area = $request->area;
        $user->area = $request->area;
        $user->hospital = $request->hospital;
        $user->code = $request->code;
        $user->save();
        return response()->json([
            'message' => 'OK',
            'user' => $user]
            , 200);
    }

    public function getUsers(Request $request) {
        $users = User::get();
        return response()->json([
            'message' => 'OK',
            'user' => $users]
            , 200);
    }

    public function login(Request $request) {

        $user = User::where('email', $request->email)->where('password', $request->password);
        if ($user) {
            session(['logged', true]);
            return view('trnasports');
        } else {
            return view('welcome');
        }

    }

    public function search(Request $request) {
        $search = $request->search;
        if ($request->type == 'person') { // person
            $result = User::where('name', 'LIKE', '%' . $search . '%')->get();
        } else { //hospital
            $result = User::where('hospital', 'LIKE', '%' . $search . '%')->get();
        }

        return response()->json([
            'message' => 'OK',
            'result' => $result]
            , 200);
    }

}
