@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Хизмат Сафарларини таҳрирлаш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('business_trips') }}"> Орқага</a>
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
            <form action="{{ route('business_trips.update',$businessTrips->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="name"><b>Сафар номи</b></label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $businessTrips->name }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="type"><b>Тури (хорижий ёки ҳудудларга)</b></label><br>
                  <select class="form-control" name="type" id="type">
                      <option value="hududiy" {{ $businessTrips->type == 'hududiy' ? 'selected' : '' }}>Hududlarga</option>
                      <option value="xorijiy" {{ $businessTrips->type == 'xorijiy' ? 'selected' : '' }}>Xorijiy</option>
                  </select>
              </div>

                <div class="form-group col-lg-6">
                    <label for="goal"><b>Мақсади</b></label>
                    <textarea name="goal" id="summernote" class="form-control" required>{{ $businessTrips->goal }}</textarea>
                </div>

                <div class="form-group col-lg-2">
                  <label for="start_date"><b>Бошланиш санаси</b></label>
                  <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $businessTrips->start_date }}" required>
                </div>

                <div class="form-group col-lg-2">
                  <label for="end_date"><b>Тугаш санаси</b></label>
                  <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $businessTrips->end_date }}" required>
                </div>

                <div class="form-group col-lg-6">
                  <label for="list_person"><b>Сафарга юборилганлар рўйхати</b></label>
                  <textarea name="list_person" id="summernote2" class="form-control" required>{{ $businessTrips->list_person }}</textarea>
                </div>

                {{-- <div class="form-group col-lg-4">
                  <label for="adress"><b>Манзил(давлат ёки ҳудуд)</b></label>
                  <input type="text" name="adress" id="adress" class="form-control" value="{{ $businessTrips->adress }}" required>
                </div> --}}
                <div class="form-group col-lg-2">
                  <label for="regions_id" class="form-label"><b>Манзил(давлат ёки ҳудуд)</b></label>
                  <select name="regions_id" class="form-control" id="regions_id" class="form-control" required>
                      <option value="">-- Xудуд --</option>
                      @foreach($regions as $region)
                        <option value="{{ $region->id }}" 
                          {{ (old('regions_id', $businessTrips->regions_id ?? '') == $region->id) ? 'selected' : '' }}>
                          {{ $region->name }}
                        </option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-6">
                  <label for="data_name"><b>Сафар доирасида/натижасида тайёрланган маълумотнома номи</b></label>
                  <input type="text" name="data_name" id="data_name" class="form-control" value="{{ $businessTrips->data_name }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="invite_count"><b>Сафар доирасида/натижасида тайёрланган таклифлар сони</b></label>
                  <input type="number" name="invite_count" id="invite_count" class="form-control" value="{{ $businessTrips->invite_count }}" min="0">
                </div>

                <div class="form-group col-lg-4">
                  <label for="ball"><b>Маълумотнома/ таклифлар тайёрлашда иштирок этган ходимлар рўйхати ва қўшган ҳиссаси (балл)</b></label>
                  <input type="number" name="ball" id="ball" class="form-control" value="{{ $businessTrips->ball }}" min="0" required>
                </div>

                <div class="form-group col-lg-2">
                  <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
                  <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
                      @foreach($quarters as $quarter)
                        <option value="{{ $quarter->id }}" 
                          {{ (old('quarters_id', $businessTrips->quarters_id ?? '') == $quarter->id) ? 'selected' : '' }}>
                          {{ $quarter->name }}
                        </option>
                      @endforeach
                  </select>
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
