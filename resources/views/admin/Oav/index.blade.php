@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="col-lg-12 mb-4">
            <h2>ОАВ нашриёт ишлари сони</h2>
        </div>
    @else
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>ОАВ нашриёт ишлари</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary mb-2" href="{{ route('oavpublish.create') }}">ОАВ нашриёт ишлари қўшиш</a>
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
                    <th>Ишлар номи</th>
                    <th>Ишлар тури</th>
                    <th>Ходим ФИО (бир нечта бўлса)</th>
                    <th>ОАВ номи</th>
                    <th>Нашр этилган санаси</th>
                    <th>Ҳавола</th>
                    <th>Чораклар</th>
                    @if(Auth::user()->name == 'Abdixojayev')
                    @else
                        <th>Action</th>  
                    @endif
                </tr>
          </thead>
          <tbody>
            @foreach ($oavpublishes as $trip)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $trip->name }}</td>
                    <td>{{ $trip->whoPublish->name }}</td>
                    <td>{{ $trip->fio }}</td>
                    <td>{{ $trip->oav_name }}</td>
                    <td>{{ $trip->date }}</td>
                    <td>{!! $trip->link !!}</td>
                    <td>{{ $trip->quarter->name }}</td>
                    @if (Auth::user()->name == 'Abdixojayev')
                    @else
                    <td>
                        <form action="{{ route('oavpublish.destroy',$trip->id) }}" method="POST">        
                            <a class="btn btn-info mb-1" href="{{ route('oavpublish.edit',$trip->id) }}">Ўзгартириш</a>
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
