@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
            <h3>Your Memories</h3>
          </div>
          <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('memories.create') }}">Add memories</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @forelse ($memories as $memory)
        <div class="">
        </div>
        @empty
        <div>No Memories add some...</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection