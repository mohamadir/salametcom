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
use App\Contact;
use App\Donate;
use App\Help;
use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// ===========================================  DASHBOARD =============================================================

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    return view('dashboard', ['user' => Auth::user()]);
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
    return view('dashboard', ['user' => Auth::user()]);

});

Route::get('/signout', function () {
    Auth::logout();
    session(['logged' => false]);
    return redirect('/');
});
// ===========================================  USERS =============================================================

Route::get('/users', function (Request $request) {
    if (!Auth::check()) {
        return view('asklogin');
    }
    if ($request->search) {
        $users = User::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('users', ['users' => $users, 'user' => Auth::user()]);
    }
    $users = User::get();
    return view('users', ['users' => $users, 'user' => Auth::user()]);
});

Route::post('/delete/{id}', function (Request $request, $id) {

    $user = User::where('id', '=', $id)->first();
    $user->delete();
    return redirect('/users');
});

// ===========================================  CONTACTS =============================================================

Route::get('/add_contacts', function (Request $request) {

    if (!Auth::check()) {
        return view('asklogin');
    }

    return view('add_contacts', ['user' => Auth::user()]);

});

Route::get('/contacts', function (Request $request) {

    if (!Auth::check()) {
        return view('asklogin');
    }

    if ($request->search) {
        $contacts = Contact::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('contacts', ['contacts' => $contacts, 'user' => Auth::user()]);
    }

    $contacts = Contact::get();

    return view('contacts', ['contacts' => $contacts, 'user' => Auth::user()]);
});

Route::post('/contacts/delete/{id}', function (Request $request, $id) {
    $contact = Contact::where('id', '=', $id)->first();
    $contact->delete();
    return redirect('/contacts');
});

Route::post('/contacts', function (Request $request) {

    if (!$request->name) {
        return view('add_contacts', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة الاسم',
        ]);
    }
    if (!$request->email) {
        return view('add_contacts', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة  البريد الالكتروني',
        ]);
    }
    if (!$request->email) {
        return view('add_contacts', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة المهنة',
        ]);
    }
    if (!$request->phone) {
        return view('add_contacts', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة رقم الهاتف',
        ]);
    }

    $contact = Contact::where('phone', $request->phone)->first();
    if ($contact) {
        return view('register', [
            'error' => 'هذا المستخدم موجود',
            'user' => Auth::user(),
        ]);
    }

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->profession = $request->profession;

    $contact->save();

/*     Auth::login($user);
session(['logged' => true]); */
    return redirect('/contacts');
});
// ===========================================  REGISTER =============================================================

Route::get('/register', function () {
    if (!Auth::check()) {
        return view('asklogin');
    }

    return view('register', ['user' => Auth::user()]);
});

Route::post('/register', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if ($user) {
        return view('register', [
            'error' => 'هذا المستخدم موجود',
            'user' => Auth::user(),
        ]);
    }

    if (!$request->name) {
        return view('register', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة الاسم',
        ]);
    }
    if (!$request->email) {
        return view('register', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة  البريد الالكتروني',
        ]);
    }
    if (!$request->password) {
        return view('register', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة كلمة المرور',
        ]);
    }
    if (!$request->phone) {
        return view('register', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة رقم الهاتف',
        ]);
    }
    if (!$request->area) {
        return view('register', ['user' => Auth::user(),
            'error_message' => 'الرجاء كتابة المنطقة',
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

/*     Auth::login($user);
session(['logged' => true]); */
    return view('dashboard', ['user' => Auth::user(), 'register_message' => $user]);
});

// ===========================================  TRANSPORTS =============================================================

Route::get('/transports', function () {
    if (!Auth::check()) {
        return view('asklogin');
    }
    return view('transports', ['user' => Auth::user()]);
});

Route::post('/transports', function (Request $request) {

    $to = $request->to;
    $from = $request->from;
    $people = $request->people;
    $price_share = $request->price_share;

    if (!$request->from) {
        return view('transports', ['user' => Auth::user(),
            'from_error' => 'الرجاء كتابة مكان التوصيل',
            'from' => $from,
            'to' => $to,
            'people' => $people,
            'price_share' => $price_share,
        ]);
    }

    if (!$request->to) {
        return view('transports', ['user' => Auth::user(), 'to_error' => 'الرجاء كتابة مكان التوصيل',
            'from' => $from,
            'to' => $to,
            'people' => $people,
            'price_share' => $price_share,
        ]);
    }

    if (!$request->people) {
        return view('transports', ['user' => Auth::user(), 'people_error' => 'الرجاء كتابة عدد الاشخاص',
            'from' => $from,
            'to' => $to,
            'people' => $people,
            'price_share' => $price_share,
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
    return view('dashboard', ['user' => Auth::user(),
        'message' => 'شكراَ جزيلاَ']);
});

// ===========================================  HELPS =============================================================

Route::get('/helps', function () {
    if (!Auth::check()) {
        return view('asklogin');
    }
    return view('helps', ['user' => Auth::user()]);
});

Route::post('/helps', function (Request $request) {
    $patient = $request->patient;

    if (!$patient) {
        return view('helps', ['user' => Auth::user(),
            'patient_error' => 'الرجاء كتابة اسم المريض',
        ]);
    }

    $help = new Help();
    $help->price = $request->price;
    $help->patient = $request->patient;
    $help->patient_phone = $request->patient_phone;
    $help->help_type = $request->help_type;
    $help->asked_from = $request->asked_from;
    $help->description = $request->description;
    $help->hospital = $request->hospital;

    $help->save();
    return view('dashboard', ['user' => Auth::user(),
        'message' => 'شكراَ جزيلاَ']);
});

// ===========================================  STATISTICS =============================================================

Route::get('/statistics', function () {
    if (!Auth::check()) {
        return view('asklogin');
    }
    return view('statistics', ['user' => Auth::user()]);
});

Route::post('/statistics', 'StatisticsController@statistics');

// ===========================================  DONATE =============================================================

Route::get('/donates', function () {
    if (!Auth::check()) {
        return view('asklogin');
    }
    return view('donates', ['user' => Auth::user()]);
});

Route::post('/donates', function (Request $request) {
    $donor_name = $request->donor_name;
    $donate_type = $request->donate_type;

    if (!$donor_name) {
        return view('donates', ['user' => Auth::user(),
            'donor_name_error', 'الرجاء كتابة اسم المتبرع',
        ]);
    }

    if (!$donor_name) {
        return view('donates', ['user' => Auth::user(),
            'donate_type_error', 'الرجاء كتابة نوع التبرع',
        ]);
    }

    $donate = new Donate();
    $donate->donor_name = $request->donor_name;
    $donate->donate_type = $request->donate_type;
    $donate->description = $request->description;

    $donate->save();
    return view('dashboard', ['user' => Auth::user(),
        'message' => 'شكراَ جزيلاَ']);

});

// ===========================================  TOOLS =============================================================

Route::get('/tools', function () {
    if (!Auth::check()) {
        return view('asklogin');
    }
    return view('tools', ['user' => Auth::user()]);
});

Route::post('/tools', 'ToolController@addTool');

// ===========================================  GRAPH =============================================================
Route::get('/graph', function () {
    return view('graph', ['user' => Auth::user()]);
});