@extends('layouts.client')

@section('title', 'Asosiy')

@section('content')
<table>
  <tr>
    <th>ID</th>
    <th>Ko`rsatkich nomi</th>
    <th>1-chorak</th>
    <th>2-chorak</th>
    <th>3-chorak</th>
    <th>4-chorak</th>
  </tr>
 
  <tr>
   <td>Sa</td>
   <td></td>
    <td>{{$businessTripCounts[0]->first_quater}}</td>
    <td>{{$businessTripCounts[0]->second_quater}}</td>
    <td>{{$businessTripCounts[0]->third_quater}}</td>
    <td>{{$businessTripCounts[0]->fourth_quater}}</td>
  </tr>


</table> 
@endsection
