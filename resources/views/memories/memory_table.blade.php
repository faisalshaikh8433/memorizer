<table class="table table-hover">
  <thead>
    <tr>
      <td>Date</td>
      <td>Image</td>
      <td>Notes</td>
      <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach ($memories as $memory)
    <tr>
      <td>{{$memory->date->format('d-m-Y')}}</td>
      <td>
        <img class="img-thumbnail" src="{{$memory->image}}" />
      </td>
      <td>{{$memory->notes}}</td>
      <td>
        <div class="btn-group">
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