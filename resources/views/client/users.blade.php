@extends('layouts.client')

@section('title', 'Asosiy')

@section('content')
<table>
    <thead>
      <tr>
        <th>№</th>
        <th>Малумот киритувчи логини</th>
        <th>Малумот киритувчи емаил</th>
        {{-- <th>Киритувчи малумотлари</th> --}}
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            {{-- <td></td>  --}}
        </tr>
        @endforeach 
    </tbody>
  </table>
@endsection
