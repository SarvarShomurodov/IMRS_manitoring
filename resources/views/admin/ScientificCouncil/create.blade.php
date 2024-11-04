@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Илмий даража қўшиш</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('scientific') }}"> Орқага</a>
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
                    <form action="{{ route('scientific.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label for="type_id"><b>Илмий даража</b></label>
                                <select name="degree_id" id="degree_id" class="form-control" required>
                                    <option value="">-- илмий даража турлари --</option>
                                    @foreach($scientificIds as $type)
                                    <option value="{{ $type->id }}" {{ old('degree_id', $type->degree_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>                  

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Ф.И.Ш</b></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Изланувчилик тури</b></label>
                                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
                            </div>

                            <div class="form-group col-lg-2">
                                <label for="start_date"><b>ўқишга кирган сана</b></label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
                              </div>
              
                              <div class="form-group col-lg-2">
                                <label for="end_date"><b>ўқишни битирган сана</b></label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
                              </div>

                            <div class="form-group col-lg-2">
                                <label for="date"><b>Ҳимоя санаси</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                            </div>

                            <div class="form-group col-lg-2">
                                <label for="quarters_id" class="form-label"><b>Чораклар</b></label>
                                <select name="quarters_id" id="quarters_id" class="form-control" required>
                                    <option value="">-- Чораклар --</option>
                                    @foreach($quarters as $quarter)
                                    <option value="{{ $quarter->id }}" {{ old('quarters_id') == $quarter->id ? 'selected' : '' }}>
                                        {{ $quarter->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Жо`натиш</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
