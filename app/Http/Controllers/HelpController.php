<?php

namespace App\Http\Controllers;

use App\Help;
use Illuminate\Http\Request;

class HelpController extends Controller {
    //
    //
    public function addHelp(Request $request) {

        $help = new Help();
        $help->price = $request->price;
        $help->patient = $request->patient;
        $help->hospital = $request->hospital;
        $help->help_type = $request->help->type;
        $help->asked_from = $request->asked_from;

        $help->save();
        return response()->json([
            'message' => 'OK',
            'help' => $help]
            , 200);
    }

    public function getHelps(Request $request) {
        $helps = Help::get();
        return response()->json([
            'message' => 'OK',
            'helps' => $helps]
            , 200);
    }
}
