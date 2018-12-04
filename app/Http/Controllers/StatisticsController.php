<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool;
use App\User;
use App\Help;
use App\Donate;
use App\Transport;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller {
    //
    public function statistics(Request $request) {
        $from = date($request->from_date);
        $to = date($request->to_date);
        $type = $request->type;
        if($request->info_type == 'graph'){
            $tool = Tool::where('created_at','>=',$from)->where('created_at','<=',$to);
            $donate = Donate::where('created_at','>=',$from)->where('created_at','<=',$to);
            $help = Help::where('created_at','>=',$from)->where('created_at','<=',$to);
            $transport = Transport::where('created_at','>=',$from)->where('created_at','<=',$to);

            return view('graph',[
                'user'=>Auth::user(),
                'donate' => $donate->count(),
                'help' => $help->count(),
                'from' => $from,
                'to' => $to,
                'tool' =>  $tool->get(),
                'transport' => $transport->count()
            ]);
        }
        $typeNumber = -1;
        if($type == 'Tool'){
            $results = Tool::where('created_at','>=',$from)->where('created_at','<=',$to);
            $typeNumber = 1;
        }
        if($type == 'Help'){
            $results = Help::where('created_at','>=',$from)->where('created_at','<=',$to);
            $typeNumber = 2;
        }
        if($type == 'Donate'){
            $results = Donate::where('created_at','>=',$from)->where('created_at','<=',$to);
            $typeNumber = 3;
        }
        if($type == 'Transport'){
            $results = Transport::where('created_at','>=',$from)->where('created_at','<=',$to);
            $typeNumber = 4;
        }
        
        return view('results',[
            'user'=>Auth::user(),
            'from' => $from,
            'to' => $to,
            'type' => $typeNumber,
            'results' =>  $results->get(),
            'count' => $results->count()
        ]);

    
    }

}
