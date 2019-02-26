@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">

        <div class="card">
          <h5 class="card-header">Show Image</h5>
          <div class="card-body">
            <h5 class="card-title">Mes Images </h5>

            <div class="col-md-4 px-0">

              @if ($image->photo_local_link)
              <img id="avatar" class="rounded img-fluid" src="{{Storage::url($image->photo_local_link)}}" alt="Avatar">
              @endif
          </div>


      </div>

  </div>
</div>
</div>


@endsection
