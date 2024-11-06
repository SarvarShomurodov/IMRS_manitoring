@extends('layouts.app-admin')

@section('title', 'Business Trips')

@section('content')
@if (Auth::user()->name == 'Abdixojayev')
    <div class="col-lg-12 mb-4">
        <h2>Институт Ёш иқтисодчилар мажлислари сони</h2>
    </div>
@else
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Ёш Иқтисодчилар</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary mb-2" href="{{ url('young_economists/create') }}">Ёш Иқтисодчилар қўшиш</a>
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
                    <th>Маърузачининг ф.и.ш.</th>
                    <th>Маърузачи лавозими (докторант, таянч докторант, мустақил изланувчи, илмий ходим)</th>
                    <th>Мажлис санаси</th>
                    <th>Иштирокчилар руйҳати (маҳаллий)</th>
                    <th>Иштирокчилар рўйхати (чет эл вакиллари)</th>
                    <th>Чораклар</th>
                    @if(Auth::user()->name == 'Abdixojayev')
                    @else
                        <th>Action</th>  
                    @endif
                </tr>
          </thead>
          <tbody>
            @foreach ($youngEconomists as $trip)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $trip->name }}</td>
                    <td>{{ $trip->position }}</td>
                    <td>{{ $trip->date }}</td>
                    <td>{!! $trip->list_person_local !!}</td>
                    <td>{!! $trip->list_person_no_local !!}</td>
                    <td>{{ $trip->quarter->name }}</td>
                    @if (Auth::user()->name == 'Abdixojayev')
                    @else
                    <td>
                        <form action="{{ route('young_economists.destroy',$trip->id) }}" method="POST">        
                            <a class="btn btn-info mb-1" href="{{ route('young_economists.edit',$trip->id) }}">Ўзгартириш</a>
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
