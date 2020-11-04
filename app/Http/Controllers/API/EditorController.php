<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      "texto" => "required"
    ]);
    $texto = new Editor([
      "texto" => $request->get('texto')
    ]);
    $texto->save();
    return new DataResource($texto);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $texto = Editor::findOrFail($id);
    return new DataResource($texto);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      "texto" => "required"
    ]);
    $texto = Editor::findOrFail($id);
    $texto->texto = $request->get('texto');
    $texto->save();
    return new DataResource($texto);
  }
}
