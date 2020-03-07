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
        @include ('memories.memory_table', [
        'memories' => $memories,
        ])
      </div>
    </div>
  </div>
</div>
@endsection