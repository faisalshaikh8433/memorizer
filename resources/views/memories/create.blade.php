@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Add New Memory</div>
      <form action="{{ route('memories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="memoryDate" class="label-control">Memory Date</label>
            <input type="date" id="memoryDate" class="form-control" name="date" value="{{date('Y-m-d')}}">
          </div>
          <div class="form-group">
            <label for="notes" class="label-control">Notes</label>
            <textarea name="notes" id="notes" class="form-control" cols="0" rows="5"></textarea>
          </div>
          <image-input-component></image-input-component>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection