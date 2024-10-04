@extends('layouts.app-admin')

@section('title', 'Business Trips')

@section('content')
  
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
          <div class="card-title">Ёш Иқтисодчилар</div>
        </div>
        <div class="card-body">
          @if (Auth::user()->name == 'Abdixojayev')
            
          @else
            <div class="card-sub">
              <a href="{{ route('young_economists.create') }}" class="btn btn-primary">Mажлисларини қо`шиш</a> 
            </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="text-center">
                    <tr>
                        <th>№</th>
                        <th>Маърузачининг ф.и.ш.</th>
                        <th>Маърузачи лавозими (докторант, таянч докторант, мустақил изланувчи, илмий ходим)</th>
                        <th>Мажлис санаси</th>
                        <th>Иштирокчилар руйҳати (маҳаллий)</th>
                        <th>Иштирокчилар рўйхати (чет эл вакиллари)</th>
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
                        <td>{{ $trip->list_person_local }}</td>
                        <td>{{ $trip->list_person_no_local }}</td>
                        @if (Auth::user()->name == 'Abdixojayev')
                        @else
                        <td>
                            <form action="" method="POST">        
                                <a class="btn btn-primary mb-2" href="">Ўзгартириш</a>
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
          </div>
        </div>
      </div>
@endsection
