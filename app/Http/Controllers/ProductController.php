<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getMessages(Request $request){

        return $this->messages($request);
    }

    public function myMessages($message_key){
        $messages=[
            ['type'=>'invalid_city','message'=>'Please select city name']
        ];
        $message_body= collect($messages)->where('type',$message_key)->first();
      return !empty($message_body) ?  $message_body['message'] :  false;
    }

    public function messages($request){

        $messages_array=[
           ['courier'=>'trax',
            'code'=>400,
            'error'=>'Invalid pickup or delivery city',
            'custom_message'=>$this->myMessages('invalid_city') ?  $this->myMessages('invalid_city') : 'Invalid pickup or delivery city',
            ]
         ];
    if(!empty($request->courier) && !empty($request->error) ){

        $result=collect($messages_array)->where('courier',$request->courier)->where('error',$request->error)->first();
     }
    $message= !empty( $result) ? ['courier'=>$result['courier'],'custom_message'=>$result['custom_message']] : "not found any error in collection";
      return   response()->json($message);
    }
  }

