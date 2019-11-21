<div class="form-group">
  <label for="register">Placa</label>
  <input type="text" name="register" maxlength="6" id="register" class="form-control form-control-lg" value="{{ old('register') ? old('register') : $car->register }}" required>
</div>
<div class="form-group">
  <label for="type">Tipo</label>
  <input type="text" name="type" id="type" class="form-control" value="{{ old('type') ? old('type') : $car->type }}" required>
</div>
<div class="form-group">
  <label for="brand">Marca</label>
  <select name="brand" id="brand" class="form-control">
    @foreach($carBrands as $carBrand)
      <option value="{{ $carBrand }}" {{ $carBrand == $car->brand ? 'selected' : '' }}>{{ $carBrand }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="register">Color</label>
  <input type="color" name="color" id="color" class="form-control" value="{{ old('color') ? old('color') : $car->color }}" required>
</div>
<div class="form-group">
  <label for="owner_id">Propietario</label>
  <select name="owner_id" id="owner_id" class="form-control">
    @foreach($users as $user)
      <option value="{{ $user->id }}" {{ $user->id == $car->owner_id ? 'selected' : '' }}>{{ $user->last_name.' '.$user->first_name.' '.$user->second_name }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="driver_id">Conductor</label>
  <select name="driver_id" id="driver_id" class="form-control">
    @foreach($users as $user)
      <option value="{{ $user->id }}" {{ $user->id == $car->driver_id ? 'selected' : '' }}>{{ $user->last_name.' '.$user->first_name.' '.$user->second_name }}</option>
    @endforeach
  </select>
</div>
