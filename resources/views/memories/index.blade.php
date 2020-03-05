@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="card">
      {{-- <div class="card-header">Memories</div> --}}
      <div class="card-body">
        @forelse ($memories as $memory)
        <div class="">
        </div>
        @empty
        <div>No Memories ...</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection