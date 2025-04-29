@extends('layouts.app-admin')

@section('title', 'Business Trips')

@section('content')
@if (Auth::user()->name == 'Abdixojayev')
<div class="col-lg-12 mb-4">
    <h2>Хизмат сафарлар</h2>
</div>
@else
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Хизмат Сафарлари</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary mb-2" href="{{ url('business_trips/create') }}">Янги хизмат сафарини қўшиш</a>
      </div>
  </div>
</div>
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
                <th>Сафар номи</th>
                <th>Tури(хорижий ёки ҳудудларга)</th>
                <th>Мақсади</th>
                <th>Бошланиш санаси</th>
                <th>Тугаш санаси</th>
                <th>Манзил(давлат ёки ҳудуд)</th>
                <th>Сафарга юборилганлар рўйхати</th>
                <th>Сафар доирасида/натижасида тайёрланган маълумотнома номи</th>
                <th>Сафар доирасида/натижасида тайёрланган таклифлар сони</th>
                {{-- <th>Маълумотнома/ таклифлар тайёрлашда иштирок этган ходимлар рўйхати ва қўшган ҳиссаси (балл)</th> --}}
                <th>Чораклар</th>
                @if(Auth::user()->name == 'Abdixojayev' || Auth::user()->name == 'Qutliyev')
                @else
                    <th>Action</th>  
                @endif
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
                <td>
                    @foreach($trip->regions as $region)
                      {{ $region->name }}@if (!$loop->last), @endif
                      @endforeach
                </td>
                <td>{!! $trip->list_person !!}</td>
                <td>{{ $trip->data_name }}</td>
                <td>{{ $trip->invite_count }}</td>
                {{-- <td>{{ $trip->ball }}</td> --}}
                <td>{{ $trip->quarter->name }}</td>
                @if (Auth::user()->name == 'Abdixojayev' || Auth::user()->name == 'Qutliyev')
                @else
                <td>
                    <form action="{{ route('business_trips.destroy',$trip->id) }}" method="POST">        
                        <a class="btn btn-info mb-1" href="{{ route('business_trips.edit',$trip->id) }}">Ўзгартириш</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ўчириш</button>
                    </form>
                </td> 
                @endif
            </tr>
        @endforeach
      </tbody>
    </table>
@endsection
