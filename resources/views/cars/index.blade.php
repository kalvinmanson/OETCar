@extends('layouts.app')

@section('content')
<div class="container">
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNew"><i class="fa fa-plus"></i> Agregar vehiculo</button>
  <h1>Vehiculos</h1>
  <table class="table table-striped">
    <tr>
      <th width="20">Id</th>
      <th>Información</th>
      <th>Propietario</th>
      <th>Conductor</th>
      <th></th>
    </tr>
    @foreach($cars as $car)
    <tr>
      <td>{{ $car->id }}</td>
      <td>
        Placa:
          <a href="{{ route('cars.edit', $car->id) }}">
            <strong>{{ $car->register }}</strong>
          </a><br>
        <span class="badge text-white p-2" style="background-color: {{ $car->color }};">{{ $car->type.' | '.$car->brand }}</span>
      </td>
      <td>
        @if($car->owner)
          @include('users._card', ['user' => $car->owner])
        @endif
      </td>
      <td>
        @if($car->driver)
          @include('users._card', ['user' => $car->driver])
        @endif
      </td>
      <td>
        <small>
          Created at {{ $car->created_at }},<br>
          Last update {{ $car->updated_at->diffForHumans() }}
        </small>
      </td>
    </tr>
    @endforeach
  </table>

  {{ $cars->links() }}
</div>


<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('cars.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Add new</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('cars._form', ['car' => $newCar])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection
