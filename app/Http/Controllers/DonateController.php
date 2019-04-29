<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donate;

class DonateController extends Controller
{
    //

    public function getDonates(Request $request){
        $donates = Donate::get();
        return response()->json([
            'message' => 'OK',
            'donates' => $donates]
            , 200);
    }
    
}
