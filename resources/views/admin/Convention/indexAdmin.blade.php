@extends('layouts.app-admin')

@section('title', 'Publishes')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Институт ходимлари иштирок этган тадбирлар сонини ҳудудлар бўйича филтрлаш</h2>
                </div>
                <div class="pull-right mb-4">
                    <form action="{{ route('convent_admin.indexAdmin') }}" method="GET" class="d-inline-block">
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
        <table>
          <thead>
                <tr>
                    <th>№</th>
                    <th>Анжуман номи</th>
                    <th>Асос</th>
                    <th>Тури</th>
                    <th>Ташкилотчи</th>
                    <th>Саналар</th>
                    <th>Манзил(давлат ёки ҳудуд)</th>
                    <th>Иштирок этган ходимлар сони</th>
                    <th>Иштирокчилар рўйхати</th>
                    <th>Чораклар</th>
                </tr>
          </thead>
          <tbody>
            @foreach ($conventions as $trip)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{!! $trip->name !!}</td>
                    <td>{{ $trip->whogiven->name }}</td>
                    <td>{{ $trip->conventionType->name  }}</td>
                    <td>{{ $trip->organizer }}</td>
                    <td>{{ $trip->date }}</td>
                    <td>{{ $trip->regionsVal->name }}</td>
                    <td>{{ $trip->employees_count }}</td>
                    <td>{!! $trip->list !!}</td>
                    <td>{{ $trip->quarter->name }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
@endsection
