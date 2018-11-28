<?php

namespace App\Http\Controllers;

use App\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller {
    //

    public function addTransport(Request $request) {

        $transport = new Transport();
        $transport->to = $request->to;
        $transport->from = $request->from;
        $transport->people = $request->people;
        $transport->driver = $request->driver;
        $transport->price_share = $request->price_share;
        $transport->save();
        return response()->json([
            'message' => 'OK',
            'transport' => $transport]
            , 200);
    }
    public function getTransports(Request $request) {
        $transports = Transport::get();
        return response()->json([
            'message' => 'OK',
            'transports' => $transports]
            , 200);
    }
}
