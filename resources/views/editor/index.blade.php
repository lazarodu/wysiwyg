@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{url('editor/create')}}" class="btn btn-primary">
    <i class="fa fa-plus-circle"></i> Adicionar
  </a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Texto</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
    </thead>
    <tbody>
      @foreach($textos as $texto)
      <tr>
        <td>{!!$texto->texto!!}</td>
        <td>
          <a href="{{route('editor.edit',$texto->id)}}" class="btn btn-info">
            <i class="fa fa-pencil"></i>
          </a>
        </td>
        <td>
          <form method="POST" action="{{route('editor.destroy',$texto->id)}}" onsubmit="if(!confirm('Tem Certeza?')){return false;}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
              <i class="fa fa-trash"></i>
            </button>
          </form>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="editors"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
