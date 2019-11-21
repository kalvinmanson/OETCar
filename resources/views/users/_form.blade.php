<div class="form-group">
  <label for="document">Cedula</label>
  <input type="number" name="document" id="document" class="form-control" value="{{ old('document') ? old('document') : $user->document }}" required>
</div>
<div class="form-group">
  <label for="first_name">Primer nombre</label>
  <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" value="{{ old('first_name') ? old('first_name') : $user->first_name }}" required>
</div>
<div class="form-group">
  <label for="second_name">Segundo nombre</label>
  <input type="text" name="second_name" id="second_name" class="form-control form-control-lg" value="{{ old('second_name') ? old('second_name') : $user->second_name }}" required>
</div>
<div class="form-group">
  <label for="last_name">Apellidos</label>
  <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" value="{{ old('last_name') ? old('last_name') : $user->last_name }}" required>
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email') : $user->email }}" required>
</div>
<div class="form-group">
  <label for="address">Dirección</label>
  <input type="text" name="address" id="address" class="form-control" value="{{ old('address') ? old('address') : $user->address }}">
</div>
<div class="form-group">
  <label for="phone">Teléfono</label>
  <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') ? old('phone') : $user->phone }}">
</div>
<div class="form-group">
  <label for="city">Ciudad</label>
  <input type="text" name="city" id="city" class="form-control" value="{{ old('city') ? old('city') : $user->city }}">
</div>
