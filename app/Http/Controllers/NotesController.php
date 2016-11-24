<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NotesController extends Controller
{
    public function show(Request $request)
    {
    	$user = Auth::user();
    	if($user){
    		$notes = $user->notes;
    		return view("notes.notes",compact('notes'));

    	}else{
    		return redirect("/");
    	}
    }

    public function add(Request $request)
    {
    	$user = Auth::user();
    	if($user){
    		$note = new Note;
    		//$note->note_content = $request->content;
    		$user->notes()->save($note);
    		return redirect("/notes");
    	}else{
    		return redirect("/");
    	}
    }
}
