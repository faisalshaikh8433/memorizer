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
            <label for="description" class="label-control">Description</label>
            <textarea name="description" id="description" class="form-control" cols="0" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="file" class="label-control">Upload a file</label>
            <input type="file" id="file" class="form-control border-0" name="image">
          </div>

        </div>
        {{-- <div class="card-footer">
          <button type="submit" class="btn btn-secondary">Save</button>
        </div> --}}
      </form>
    </div>
  </div>
</div>
@endsection