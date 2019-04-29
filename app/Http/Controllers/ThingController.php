<?php

namespace App\Http\Controllers;

use App\Thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller {
    //

    public function addThing(Request $request) {

        if (!$request->type) {
            return view('things', ['user' => Auth::user(),
                'error' => 'الرجاء كتابة اسم الغرض',
            ]);
        }
        if (!$request->quantity) {
            return view('things', ['user' => Auth::user(),
                'error' => 'الرجاء كتابة الكمية',
            ]);
        }

        $thing = new Thing();
        $thing->type = $request->type;
        $thing->quantity = $request->quantity;
        $thing->description = $request->description;

        $thing->save();
        $things = Thing::get();
        return view('store', ['things' => $things, 'user' => Auth::user()]);

    }

    public function getThings(Request $request) {
        if (!Auth::check()) {
            return view('asklogin');
        }
        if ($request->search) {
            $things = Thing::where('type', 'LIKE', '%' . $request->search . '%')->get();
            return view('store', ['things' => $things, 'user' => Auth::user()]);
        }

        $things = Thing::get();

        return view('store', ['things' => $things, 'user' => Auth::user()]);

    }
}
