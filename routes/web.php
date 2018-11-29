<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    $logged = session('logged', false);
    if (!$logged) {
        return redirect('/login');
    }
    return view('dashboard',['user'=>Auth::user()]);
});

Route::get('/login', function () {
        return view('login');
});

Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return view('login', ['error' => 'البريد الالكتروني غير موجود']);
    }
    $user = User::where('email', $request->email)->where('password', $request->password)->first();

    if (!$user) {
        return view('login', ['error' => 'كلمة المرور خاطئة']);
    }
    Auth::loginUsingId($user->id);
    session(['logged' => true]);
    return redirect('/');

});

Route::post('/register', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if ($user) {
        return view('register', [
            'error' => 'هذا المستخدم موجود',
        ]);
    }

    $user = new User();

    $user->is_admin = $request->role == 'admin' ? true : false;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->position = $request->position;
    $user->area = $request->area;
    $user->password = $request->password;
    $user->area = $request->area;
    $user->hospital = $request->hospital;
    $user->code = $request->code;
    $user->save();
    session(['logged' => true]);
    return redirect('/');
});

Route::get('/signout', function () {
    Auth::logout();
    session(['logged' => false]);
    return redirect('/');
});

Route::get('/transports', function () {
    return view('transports',['user'=>Auth::user()]);
});

Route::get('/helps', function () {
    return view('helps');
});

Route::get('/register', function () {
    return view('register');
});
