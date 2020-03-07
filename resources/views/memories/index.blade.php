@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
            <h3>All Memories</h3>
          </div>
          <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('memories.create') }}">Add New</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @forelse ($memories as $memory)
        <table class="table table-hover">
          <thead>
            <tr>
              <td>Date</td>
              <td>Image</td>
              <td>Notes</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$memory->date->format('d-m-Y')}}</td>
              <td>
                <img src="{{$memory->image}}" />
              </td>
              <td>{{$memory->notes}}</td>
            </tr>
          </tbody>
        </table>
        @empty
        <div>No Memories ...</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection