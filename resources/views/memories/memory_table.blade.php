<table class="table table-hover">
  <thead>
    <tr>
      <td>Date</td>
      <td>Image</td>
      <td>Notes</td>
      <td>Attributes</td>
      <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach ($memories as $memory)
    <tr>
      <td>{{$memory->date->format('d-m-Y')}}</td>
      <td>
        <img class="img-thumbnail" src="{{$memory->image}}" width="50%" />
      </td>
      <td>{{$memory->notes}}</td>
      <td>
        @if($memory->attributes)
        @foreach ($memory->attributes as $attribute)
        <b>{{ $attribute['name'] }}</b>: {{ $attribute['value'] }}<br />
        @endforeach
        @endif
      </td>
      <td>
        <div class="btn-group">
          <a href="{{route('memories.show', $memory->id)}}" class="btn btn-primary">View</a>
          <form action="{{ route('memories.destroy', $memory->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete ?')">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete" class="btn btn-danger">
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>