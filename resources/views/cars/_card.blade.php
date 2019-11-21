<a href="{{ route('cars.edit', $car->id) }}" class="text-left badge text-white p-2" style="background-color: {{ $car->color }};">
  <strong>{{ $car->register }}</strong><br>
  <small>{{ $car->type.' | '.$car->brand }}</small>
</a>
