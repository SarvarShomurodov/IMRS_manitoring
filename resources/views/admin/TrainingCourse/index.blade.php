@extends('layouts.app-admin')

@section('title', 'Business Trips')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')
                
    @else
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Тренинг ўқув курси</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ url('training_courses/create') }}">Тренинг ўқув курсларини яратиш</a>
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
                    <tr>
                      <th>№</th>
                        <th>Тренинг/ўқув курси номи</th>
                        <th>Тури(онлайн ёки оффлайн)</th>
                        <th>Ташкилотчи</th>
                        <th>Саналар</th>
                        <th>Манзил(давлат ёки ҳудуд)</th>
                        <th>Иштирок этган ходимлар сони</th>
                        <th>Иштирокличар рўйхати</th>
                        <th>Chorak</th>
                        @if(Auth::user()->name == 'Abdixojayev')
                        @else
                            <th>Action</th>  
                        @endif
                    </tr>
              </thead>
              <tbody>
                @foreach ($trainingCourses as $trip)
                    <tr>
                      <td>{{ ++$i }}</td>
                        <td>{!! $trip->name !!}</td>
                        <td>{{ $trip->type }}</td>
                        <td>{!! $trip->organizer !!}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->adress }}</td>
                        <td>{{ $trip->invite_count }}</td>
                        <td>{!! $trip->list_person !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name == 'Abdixojayev')
                        @else
                        <td>
                            <form action="{{ route('training_courses.destroy',$trip->id) }}" method="POST">        
                                <a class="btn btn-info" href="{{ route('training_courses.edit',$trip->id) }}">Ўзгартириш</a>
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
