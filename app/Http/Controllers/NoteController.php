<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Note;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Note $notes)
    {
        //
        $id = Auth::user()->id;
        $notes = DB::table('notes')
                    ->where('id', $id)
                    ->orderBy('created_at','desc')
                    ->get();
       
        
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new \App\Note;
        $id = Auth::user()->id;
        $note->id = $request->get('id', $id);
        $note->noteName = $request->get('noteName');
        $note->noteText = $request->get('noteText');
        $note->notecolor =$request ->get('selected');

        $note->save();

        return redirect()->action('NoteController@index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notes = Note::find($id);
        
        //  dd($notes -> noteText);
        return view('notes.show', compact('notes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->get('choice') == 'update') {
            $notes = Note::where('noteId', $request->get('noteId'))->update(array(
                'noteName' => $request->get('noteName'),
                'noteText' => $request->get('noteText'),
                'notecolor' => $request->get('selected'),
            ));
            return redirect()->action('NoteController@index');

        }
        elseif ($request->get('choice') == 'delete') {
            $notes = Note::where('noteId', $request->get('noteId'));
            
            $notes->delete();
            return redirect()->action('NoteController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
