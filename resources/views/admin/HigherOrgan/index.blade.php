@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="col-lg-12 mb-4">
            <h2>Юқори ташкилотларнинг топшириқларга мувофиқ бажарилган ишлар сони, шундан</h2>
        </div>
    @else
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Таҳлилий материаллар</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary mb-2" href="{{ url('higher_organs/create') }}">Таҳлилий материаллар қўшиш</a>
          </div>
      </div>
    </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="text-center">
                    <tr>
                        <th>№</th>
                        <th>Таҳлилий материал номи</th>
                        <th>Асос</th>
                        <th>Топшириқ санаси(ёки хатсиз)</th>
                        <th>Топшириқ рақами(ёки хатсиз)</th>
                        <th>Кимга юборилди</th>
                        <th>Хат санаси</th>
                        <th>Хат рақами</th>
                        <th>Йўналиш</th>
                        <th>Сўровнома мавжудлиги (ҳа, йўқ)</th>
                        <th>Давлат ёки ҳудуд</th>
                        <th>Иштирок этган ходимлар ва уларнинг қўшган ҳиссаси (балл)</th>
                        <th>Чораклар</th>
                        @if(Auth::user()->name == 'Abdixojayev')
                        @else
                            <th>Action</th>  
                        @endif
                    </tr>
              </thead>
              <tbody>
                @foreach ($higherOrgans as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{!! $trip->name !!}</td>
                        <td>{{ $trip->whogiven->name }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->ass_number }}</td>
                        <td>{{ $trip->who_send }}</td>
                        <td>{{ $trip->letter_date }}</td>
                        <td>{{ $trip->letter_number }}</td>
                        <td>{{ $trip->direction }}</td>
                        <td>{{ $trip->sorov }}</td>
                        <td>{{ $trip->country }}</td>
                        <td>{{ $trip->ball }}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name == 'Abdixojayev')
                        @else
                        <td>
                            <form action="{{ route('higher_organs.destroy',$trip->id) }}" method="POST">        
                                <a class="btn btn-info" href="{{ route('higher_organs.edit',$trip->id) }}">Ўзгартириш</a>
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
