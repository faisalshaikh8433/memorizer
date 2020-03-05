@component('layouts.app')
<div class="row justify-content-center">
  <div class="card">
    <div class="card-header">Add New Memory</div>
    <div class="card-body">
      <form action="{{ route('memories.store') }}" method="POST">
        <div class="form-group">
          <input type="date" class="form-control" name="sold_on">
        </div>
      </form>
    </div>
  </div>
</div>
@endcomponent