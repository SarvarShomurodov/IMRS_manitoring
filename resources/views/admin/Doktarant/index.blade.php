@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Илмий даражага эга бўлиш учун ҳимояга чиққан илмий изланувчилар сони</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Докторантура</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('doctorate.create') }}">Докторантура қўшиш</a>
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
                    <th>2024 ўқув йилига докторантурага қабул</th>
                    <th>Сони</th>
                    <th>Макроиқтисодиёт 08.00.02</th>
                    <th>Минтақавий иқтисодиёт 08.00.12</th>
                    {{-- <th>Ихтисослиги</th> --}}
                    <th>Чораклар</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $trip->doktarantVal->name }}</td>
                        <td>{{ $trip->soni }}</td>
                        <td>{{ $trip->makro }}</td>
                        <td>{{ $trip->minta }}</td>
                        {{-- <td>{{ $trip->ixtisosligi }}</td> --}}
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('doctorate.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info" href="{{ route('doctorate.edit',$trip->id) }}">Ўзгартириш</a>
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
