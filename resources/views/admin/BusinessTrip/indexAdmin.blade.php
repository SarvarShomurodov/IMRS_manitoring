<style>


</style>
@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')
        {{-- <div class="col-lg-12 mb-4">
            <h2>Юқори ташкилотларнинг топшириқларга мувофиқ бажарилган ишлар сони, шундан</h2>
        </div> --}}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Сафарлар сонини ҳудудлар бўйича филтрлаш</h2>
                </div>
                <div class="pull-right mb-4">
                    <form action="{{ route('business_admin.indexAdmin') }}" method="GET" class="d-inline-block">
                        <div class="row g-2">
                            <div class="col-auto">
                                <select name="regions_id" id="regions_id" class="form-control">
                                    <option value="">Барча ҳудудлар</option>
                                    @foreach ($regions as $quarter)
                                        <option value="{{ $quarter->id }}" {{ request('regions_id') == $quarter->id ? 'selected' : '' }}>
                                            {{ $quarter->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-auto">
                                <select name="quarters_id" id="quarters_id" class="form-control">
                                    <option value="">Барча кварталлар</option>
                                    @foreach ($quarters as $quarter)
                                        <option value="{{ $quarter->id }}" {{ request('quarters_id') == $quarter->id ? 'selected' : '' }}>
                                            {{ $quarter->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    @else
    
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- <div class="card">
        <div class="card-body">
          <div class="table-responsive"> --}}
            <table>
                <thead>
                      <tr>
                          <th>№</th>
                          <th>Сафар номи</th>
                          <th>Tури(хорижий ёки ҳудудларга)</th>
                          <th>Мақсади</th>
                          <th>Бошланиш санаси</th>
                          <th>Тугаш санаси</th>
                          <th>Манзил(давлат ёки ҳудуд)</th>
                          <th>Сафарга юборилганлар рўйхати</th>
                          <th>Сафар доирасида/натижасида тайёрланган маълумотнома номи</th>
                          <th>Сафар доирасида/натижасида тайёрланган таклифлар сони</th>
                          <th>Маълумотнома/ таклифлар тайёрлашда иштирок этган ходимлар рўйхати ва қўшган ҳиссаси (балл)</th>
                          <th>Чораклар</th>
                      </tr>
                </thead>
                <tbody>
                  @foreach ($businessTrips as $trip)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $trip->name }}</td>
                          <td>{{ $trip->type }}</td>
                          <td>{!! $trip->goal !!}</td>
                          <td>{{ $trip->start_date }}</td>
                          <td>{{ $trip->end_date }}</td>
                          <td>@foreach($trip->regions as $region)
                            {{ $region->name }}@if (!$loop->last), @endif
                            @endforeach</td>
                          <td>{!! $trip->list_person !!}</td>
                          <td>{{ $trip->data_name }}</td>
                          <td>{{ $trip->invite_count }}</td>
                          <td>{{ $trip->ball }}</td>
                          <td>{{ $trip->quarter->name }}</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
          {{-- </div>
        </div>
      </div> --}}
@endsection
