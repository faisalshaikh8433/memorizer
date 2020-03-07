<table class="table table-hover">
  <thead>
    <tr>
      <td>Date</td>
      <td>Image</td>
      <td>Notes</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($memories as $memory)
    <tr>
      <td>{{$memory->date->format('d-m-Y')}}</td>
      <td>
        <img src="{{$memory->image}}" />
      </td>
      <td>{{$memory->notes}}</td>
    </tr>
    @endforeach
  </tbody>
</table>