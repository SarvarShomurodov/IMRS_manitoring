@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Давлат ёки ҳудуд қўшиш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('region') }}"> Орқага</a>
      </div>
  </div>
</div>
<hr>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <form action="{{ route('region.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="name"><b>Давлат ёки ҳудуд</b></label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-success">Жо`натиш</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
