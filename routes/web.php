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
use App\Transport;
use Illuminate\Http\Request;

// ===========================================  DASHBOARD ============================================================= 


Route::get('/', function () {
    $logged = session('logged', false);
    if (!$logged) {
        return redirect('/login');
    }
    return view('dashboard',['user'=>Auth::user()]);
});


// ===========================================  LOGIN ============================================================= 
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

Route::get('/signout', function () {
    Auth::logout();
    session(['logged' => false]);
    return redirect('/');
});
// ===========================================  USERS ============================================================= 


Route::get('/users', function (Request $request) {
    if(!Auth::check()){
        return view('asklogin');
    }
    if($request->search){
        $users = User::where('name' , 'LIKE', '%' . $request->search . '%')->get();
        return view('users',['users'=> $users, 'user' => Auth::user()]);
    }
    $users = User::get();
    return view('users',['users'=> $users, 'user' => Auth::user()]);
});

Route::post('/delete/{id}', function (Request $request,$id) {
    $user = User::find($id)->first();
    $user->delete();
    return redirect('/users');
});


// ===========================================  REGISTER ============================================================= 

Route::get('/register', function () {
    return view('register');
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
    Auth::login($user);
    session(['logged' => true]);
    return redirect('/');
});


// ===========================================  TRANSPORTS ============================================================= 


Route::get('/transports', function () {
    if(!Auth::check()){
        return view('asklogin');
    }
    return view('transports',['user'=>Auth::user()]);
});

Route::post('/transports',function(Request $request){
    
    $to = $request->to;
    $from = $request->from;
    $people = $request->people;
    $price_share = $request->price_share;

    if(!$request->from){
        return view('transports',['user'=>Auth::user(),
        'from_error' => 'الرجاء كتابة مكان التوصيل',
        'from' => $from,
        'to' => $to,
        'people' => $people,
        'price_share' => $price_share
        ]);
    }
    if(!$request->to){
        return view('transports',['user'=>Auth::user(),'to_error' => 'الرجاء كتابة مكان التوصيل',
        'from' => $from,
        'to' => $to,
        'people' => $people,
        'price_share' => $price_share
        ]);
    }
    if(!$request->people){
        return view('transports',['user'=>Auth::user(),'people_error' => 'الرجاء كتابة عدد الاشخاص',
        'from' => $from,
        'to' => $to,
        'people' => $people,
        'price_share' => $price_share
        ]);
    }

    $transport = new Transport();
    $transport->from = $request->from;
    $transport->to = $request->to;
    $transport->people = $request->people;
    $transport->driver = $request->driver;
   /*  if($request->driver  == 'تاكسي'){
        $transport->driver = 'تاكسي';
    }else{
        $user = User::find($request->driver)->first();
        $transport->driver = $user->name;

    } */
    $transport->price_share = $request->price_share;
    $transport->save();
    return view('dashboard',['user'=>Auth::user(),
    'message'=> 'شكراَ جزيلاَ']);
});



// ===========================================  HELPS ============================================================= 


Route::get('/helps', function () {
    if(!Auth::check()){
        return view('asklogin');
    }
    return view('helps',['user'=>Auth::user()]);
});



// ===========================================  DONATE ============================================================= 

Route::get('/donate', function () {
    if(!Auth::check()){
        return view('asklogin');
    }
    return view('donate',['user'=>Auth::user()]);
});

// ===========================================  TOOLS ============================================================= 

Route::get('/tools', function () {
    if(!Auth::check()){
        return view('asklogin');
    }
    return view('tools',['user'=>Auth::user()]);
});


