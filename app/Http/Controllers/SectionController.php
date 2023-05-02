<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use App\Models\Entreprise;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SectionController extends Controller
{
    //

    public function __construct()
    {
         $this->middleware('auth');
    }

    public function section(){
        $user = Auth::user();
        $entreprises = Entreprise::all();
        $users = DB::table('users')->where('entreprise_id',$user->entreprise_id)->get();
        $entreprise = $entreprises->find($user->entreprise_id);
        $sections = DB::table('sections')->where('user_id',$user->entreprise_id)->get();
        $documents = DB::table('documents')->where('entreprise_id',Auth::user()->entreprise_id)->get();
        
        return view('pages.sections',[
            'user'=>$user,
            'entreprise'=>$entreprise,
            'users'=>$users,
            'sections'=>$sections,
            'documents'=>$documents
        ]);
    }

    public function selectSection($sections_id){
        $user = Auth::user();
        $entreprises = Entreprise::all();
        $users = DB::table('users')->where('entreprise_id',$user->entreprise_id)->get();
        $entreprise = $entreprises->find($user->entreprise_id);
        $sections = DB::table('sections')->where('user_id',$user->entreprise_id)->get();
        $allSections = Section::all();
        $section =  $allSections->find($sections_id);
        $documents = DB::table('documents')->where('entreprise_id',Auth::user()->entreprise_id)
                                           ->where('dossier_id','=',0)
                                           ->where('section_id',$sections_id)->get();
        $dossiers = DB::table('dossiers')->where('section_id',$sections_id)->get();
        $messagesNonLus = DB::table('partages')->where('email',Auth::user()->email)
                                               ->where('etat',0)->get();
        $nbMsNonLus = count($messagesNonLus);
        $taille = array();   
        $i=0;

        foreach($dossiers as $folder){
            $documents_ = DB::table('documents')->where('dossier_id',$folder->id)->get();
            $taille[$i] = 0;
            foreach($documents_ as $doc){
                $taille[$i] += $doc->taille;
            }
            $i++;
        }
        
        $demandes_ = DB::table('demandes')->where('entreprise_id',Auth::user()->entreprise_id)
                                         ->where('etat',0)->paginate(6);
        $demandes = DB::table('demandes')->where('emetteur_id',Auth::user()->id)->get();
        return view('pages.sections',[
            'user'=>$user,
            'entreprise'=>$entreprise,
            'users'=>$users,
            'sections'=>$sections,
            'section'=>$section,
            'documents' => $documents,
            'dossiers'=>$dossiers,
            'taille'=>$taille,
            'i'=> 0,
            'demandes'=>$demandes,
            'demandes_'=>$demandes_,
            'nbMsNonLus'=>$nbMsNonLus
        ]);

        //return view('pages.sections',['user'=>$user,'entreprise'=>$entreprise,'sections'=>$sections,'section'=>$section]);
        
    }

    public function creerDocumentDansSection(Request $request){
        $user = Auth::user();
        $entreprises = Entreprise::all();
        $entreprise = $entreprises->find($user->entreprise_id);
        $documents = DB::table('documents')->where('entreprise_id',Auth::user()->entreprise_id)
                                           ->where('dossier_id','=',0)->paginate(8);
        Section::create([
         'nom'=>$request->section_name,
         'user_id'=>$user->entreprise_id
        ]);   
        
        $sections = DB::table('sections')->where('user_id',$user->entreprise_id)->get();
        return view('pages.sections',['user'=>$user,'entreprise'=>$entreprise,'sections'=>$sections,'documents'=>$documents]);
    }

    public function deleteSection($section_id){
        
        $sections = Section::all();
        $section = $sections->find($section_id);
        
        $documents =  DB::table('documents')->where('entreprise_id',Auth::user()->entreprise_id)
                                            ->where('dossier_id','=',0)->paginate(8);
        foreach($documents as $document){
        $doc = Document::find($document->id);
        $doc->delete();
        Storage::delete($doc);
        }
        $section->delete();
        return redirect()->back();
    }
}
