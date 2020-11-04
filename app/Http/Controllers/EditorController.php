<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $textos = Editor::all();
    return view('editor.index', compact('textos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('editor.create');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    return view('editor.create');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $texto = Editor::findOrFail($id);
    $texto->delete();
    return redirect('/editor');
  }
}
