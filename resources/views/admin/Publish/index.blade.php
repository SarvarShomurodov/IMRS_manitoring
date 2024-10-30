@extends('layouts.app-admin')

@section('title', 'Publishes')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')

    @else
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Илмий нашриёт ишлари сони</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary mb-2" href="{{ url('publishes/create') }}">Илмий нашриёт ишларини қўшиш</a>
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
                        <th>Илмий иши номи</th>
                        <th>Муаллифи</th>
                        <th>Илмий иш тури</th>
                        <th>Журнал/анжуман ёки нашриёт номи</th>
                        <th>Чоп этилган санаси</th>
                        <th>Журнал сони рақами</th>
                        <th>Журнал/анжуман материаллар тўпламида бетлар</th>
                        <th>Ҳавола</th>
                        <th>Чораклар</th>
                        @if(Auth::user()->name == 'Abdixojayev')
                        @else
                            <th>Action</th>  
                        @endif
                    </tr>
              </thead>
              <tbody>
                @foreach ($publishes as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{!! $trip->name !!}</td>
                        <td>{{ $trip->author }}</td>
                        <td>{{ $trip->publish_type->name  }}</td>
                        <td>{!! $trip->jurnal_name !!}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->number }}</td>
                        <td>{{ $trip->pages }}</td>
                        <td>{!! $trip->link !!}</td>
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
