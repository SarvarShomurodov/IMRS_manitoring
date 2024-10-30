@extends('layouts.app-admin')

@section('title', 'Publishes')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')

    @else
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Иштирок этган (публикациясиз) анжуманлар</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary mb-2" href="{{ url('publishes/create') }}">Иштирок этган анжуманлар қўшиш</a>
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
                        <th>Анжуман номи</th>
                        <th>Асос</th>
                        <th>Тури</th>
                        <th>Ташкилотчи</th>
                        <th>Саналар</th>
                        <th>Журнал сони рақами</th>
                        <th>Манзил(давлат ёки ҳудуд)</th>
                        <th>Иштирок этган ходимлар сони</th>
                        <th>Иштирокчилар рўйхати</th>
                        <th>Чораклар</th>
                        @if(Auth::user()->name == 'Abdixojayev')
                        @else
                            <th>Action</th>  
                        @endif
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
                        <td>{{ $trip->address }}</td>
                        <td>{{ $trip->employees_count }}</td>
                        <td>{!! $trip->list !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name == 'Abdixojayev')
                        @else
                        <td>
                            <form action="{{ route('publishes.destroy',$trip->id) }}" method="POST">        
                                <a class="btn btn-info" href="{{ route('publishes.edit',$trip->id) }}">Ўзгартириш</a>
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
