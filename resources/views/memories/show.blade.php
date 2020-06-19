@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Memory</div>
      <div class="card-body">
        <div class="form-group">
          <div>Memory Date: {{$memory->date->format('d-m-Y')}}</div>
        </div>
        <div class="form-group">
          Notes: {{$memory->notes}}
        </div>
        <div class="form-group">
          <attribute-table saved-attributes={{ json_encode($memory->attributes) }} page="show">
          </attribute-table>
        </div>
        <div class="form-group">
          <img src="{{$memory->image}}" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
  @endsection