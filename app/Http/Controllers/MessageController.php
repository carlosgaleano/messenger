<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    public  function index(Request $request){
        $userId=auth()->id();
        $contactId=$request->contact_id;
        //$contactId=2;

        //dd($request->contact_id);
        return Message::select(
        DB::raw("IF(`from_id`=1,1,0) as  written_by_me"),
        'to_id',
        'content'
        )->where(function ($query) use($userId, $contactId ){
            $query->where('from_id', $userId )->where('to_id',$contactId);
        })->orwhere(function ($query) use($userId, $contactId){
            $query->where('from_id', $contactId )->where('to_id',$userId);
        })->get();



       }

    public function store(Request $request){

        //dd($request);

        $message=new Message();
        $message->from_id=auth()->id();
        $message->to_id=$request->to_id;
        $message->content=$request->content;
        $saved=$message->save();

        $data=[];
        $data['success']=$saved;
        $data['message']=$message;
        return $data;

    }
}
