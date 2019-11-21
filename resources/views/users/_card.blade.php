<a href="{{ route('users.edit', $user->id) }}" class="btn btn-light rounded-0 border text-left">
  <strong>{{ $user->first_name.' '.$user->second_name.' '.$user->last_name }}</strong><br>
  CC: {{ $user->document }} | {{ $user->email }}
</a>
