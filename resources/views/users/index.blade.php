@extends('layouts.app')

@section('content')
<div class="container">
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNew"><i class="fa fa-plus"></i> Agregar usuario</button>
  <h1>Usuarios</h1>
  <table class="table table-striped">
    <tr>
      <th width="20">Id</th>
      <th>Nombre completo</th>
      <th>Información</th>
      <th>Vehiculos (Propietario)</th>
      <th>Vehiculos (Conductor)</th>
      <th></th>
    </tr>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>
          <a href="{{ route('users.edit', $user->id) }}">
            <strong>{{ $user->first_name.' '.$user->second_name.' '.$user->last_name }}</strong>
          </a><br>
          CC: {{ $user->document }}
      </td>
      <td>
        Dirección: {{ $user->address.', '.$user->city }}<br>
        Teléfono: {{ $user->phone }}<br>
        Email: {{ $user->email }}
      </td>
      <td>
        @foreach($user->own_cars as $car)
          @include('cars._card', ['car' => $car])
        @endforeach
      </td>
      <td>
        @foreach($user->drive_cars as $car)
          @include('cars._card', ['car' => $car])
        @endforeach
      </td>
      <td>
        <small>
          Created at {{ $user->created_at }},<br>
          Last update {{ $user->updated_at->diffForHumans() }}
        </small>
      </td>
    </tr>
    @endforeach
  </table>

  {{ $users->links() }}
</div>


<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('users.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Add new</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('users._form', ['user' => $newUser])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection
