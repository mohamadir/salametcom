<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{

    //
    public function getTools(Request $request){
        $tools = Tool::get();
        return response()->json([
            'message' => 'OK',
            'tools' => $tools]
            , 200);
    }

    public function getToolsBetween(Request $request){
        $from = date($request->from_date);
        $to = date($request->todate);
        $tools = Tool::where('created_at','>=',$from)->where('created_at','<=',$to)->get();
        return $tools;
    }



    public function addTool(Request $request){

        $tool = $request->tool;
    
        if(!$request->patient){
            return view('tools',['user'=>Auth::user(),
            'patient_error' => 'الرجاء كتابة اسم المريض'
            ]);
        }
        if(!$request->tool){
            return view('tools',['user'=>Auth::user(),
            'tool_error' => 'الرجاء كتابة اسم الجهاز'
            ]);
        }
    
        $tool = new Tool();
        $tool->patient = $request->patient;
        $tool->patient_phone = $request->patient_phone;
        $tool->tool = $request->tool;
        $tool->description = $request->description;
        $tool->hospital = $request->hospital;
    
        $tool->save();
        return view('dashboard',['user'=>Auth::user(),
        'message'=> 'شكراَ جزيلاَ']);
    }
}
