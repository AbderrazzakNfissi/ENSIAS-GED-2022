<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Partage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartageController extends Controller
{
    //

  public function partagerDocument(Request $request){
    if($request->document!=null){
      $originalName =  $request->file('document')->getClientOriginalName(); 
    
      $name = $request->document->storeAs(
             'public/partage',
             $originalName
      );

    }else{
     $name = 'null';
     $originalName = 'null';
    }
    
    Partage::create([
      'message'=>$request->message,
      'email'=>$request->email,
      'document'=>$name, // a changer
      'etat'=>0,    //n'est pas encore lu 
      'user_id'=>$request->user_id,
      'document_name'=>$originalName
    ]);
    return redirect()->back();
  }


  public function messages(){
    $user = Auth::user();
    $entreprises = Entreprise::all();
    $entreprise = $entreprises->find($user->entreprise_id);
    $sections = DB::table('sections')->where('user_id',$user->entreprise_id)->get();
    $documents = DB::table('documents')->where('entreprise_id',Auth::user()->entreprise_id)->get();
    $messages = DB::table('partages')->where('email',Auth::user()->email)->orderBy('created_at','desc')->paginate(6);
    $users = DB::table('users')->where('entreprise_id',$user->entreprise_id)->get();
    $messagesNonLus = DB::table('partages')->where('email',Auth::user()->email)
    ->where('etat',0)->get();
    $nbMsNonLus = count($messagesNonLus);
    return view('pages.messages',[
        'user'=>$user,
        'entreprise'=>$entreprise,
        'users'=>$users,
        'sections'=>$sections,
        'documents'=>$documents,
        'messages'=>$messages,
        'nbMsNonLus'=>$nbMsNonLus
    ]);
  }

  public function telecharger($id){
    $messages = Partage::all();
    $message = $messages->find($id);
    $document_path = $message->document;
    return Storage::download($document_path);
  }

  public function messageVu(Request $request){
    if($request->ajax()){
       
      DB::table('partages')->where('email', Auth::user()->email)->update(['etat'=>1]);
    }
    return true;
  }
   
}
