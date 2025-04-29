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
                    <h2>Институт томонидан ташкил этилган тадбирлар сонини ҳудудлар бўйича филтрлаш</h2>
                </div>
                <div class="pull-right mb-4">
                    <form action="{{ route('ev_admin.indexAdmin') }}" method="GET" class="d-inline-block">
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
                        <th>Тадбир номи</th>
                        <th>Тадбир тури</th>
                        <th>Асос</th>
                        <th>Ташкилотчи</th>
                        <th>Максад</th>
                        <th>Тадбир санаси</th>
                        <th>Тадбир ўтказилган жой</th>
                        <th>Иштирокчилар сони (маҳаллий)</th>
                        <th>Иштирокчилар сони (чет эл вакиллари)</th>
                        <th>Натижа</th>
                        <th>Чораклар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $trip)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $trip->name }}</td>
                            <td>{{ $trip->type }}</td>
                            <td>{{ $trip->basis }}</td>
                            <td>{{ $trip->organizer }}</td>
                            <td>{!! $trip->goal !!}</td>
                            <td>{{ $trip->date }}</td>
                            <td>@foreach($trip->regions as $region)
                                {{ $region->name }}@if (!$loop->last), @endif
                                @endforeach</td>
                            <td>{{ $trip->foreignNum }}</td>
                            <td>{{ $trip->localNum }}</td>
                            <td>{!! $trip->result !!}</td>
                            <td>{{ $trip->quarter->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          {{-- </div>
        </div>
      </div> --}}
@endsection
