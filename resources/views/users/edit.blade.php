@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('users.index') }}" class="btn btn-primary float-right"><i class="fa fa-angle-left"></i> Volver</a>
  <h1>Usuarios: {{ $user->first_name.' '.$user->second_name.' '.$user->last_name }}</h1>
  <form action="{{ route('users.update', $user->id) }}" method="POST" class="card">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="card-body">
      @include('users._form', ['user' => $user])
    </div>
    <div class="card-footer">
      <a class="btn btn-danger btn-sm float-right" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
        <i class="far fa-trash-alt"></i> Eliminar
      </a>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>

<form id="destroy-form" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
  @csrf
  <input type="hidden" name="_method" value="DELETE" />
</form>
@endsection
