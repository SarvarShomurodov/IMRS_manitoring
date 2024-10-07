@extends('layouts.client')

@section('title', 'Asosiy')

@section('content')
<style>
   .grid-container {
            display: grid;
            grid-template-columns: 0.5fr 3fr 1fr 1fr 1fr 1fr 1fr; /* Adjusted width for the first column */
            gap: 10px;
            padding: 10px;
            /* border: 1px solid #ddd; */
        }
        .grid-container div {
            padding: 10px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center; /* Vertically centers the content */
            justify-content: center;
            text-align: center;
        }
        .grid-container .left-align {
            justify-content: flex-start; /* Align to the beginning of the screen (left) */
            text-align: left; /* Align text to the left */
        }
        .header {
            font-weight: bold;
        }
</style>
<div class="card">
    <div class="card-header">
      <div class="card-title text-center">
        Ўзбекистон Республикаси Вазирлар Маҳкамаси ҳузуридаги Макроиқтисодий ва ҳудудий тадқиқотлар институтида 2024 йил давомида амалга оширилган ишлар тўғрисида 
        МАЪЛУМОТ
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        {{-- <table class="table table-bordered">
          <thead>
            <tr>
                <tr>
                    <th>№</th>
                    <th>Ко`рсаткич номи</th>
                    <th>1-чорак</th>
                    <th>2-чорак</th>
                    <th>3-чорак</th>
                    <th>4-чорак</th>
                </tr>
          </thead>
          <tbody>
                <tr>
                     <td>1</td>
                     <td><a style="color: rgb(48, 48, 48)" href="{{ url('business_trips') }}">Хизмат сафарлари</a></td>
                     <td>{{$businessTripCounts[0]->first_quater}}</td>
                     <td>{{$businessTripCounts[0]->second_quater}}</td>
                     <td>{{$businessTripCounts[0]->third_quater}}</td>
                     <td>{{$businessTripCounts[0]->fourth_quater}}</td>
                </tr>
          </tbody>
        </table> --}}
        <div class="grid-container">
          <div class="header">№</div>
          <div class="header text-start">КО`РСАТКИЧ НОМИ</div>
          <div class="header">1-ЧОРАК</div>
          <div class="header">2-ЧОРАК</div>
          <div class="header">3-ЧОРАК</div>
          <div class="header">4-ЧОРАК</div>
          <div class="header">Йил бўйича Режа</div>
          
          <div>1</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('business_trips') }}">Хизмат сафарлар</a></div>
          <div>{{$businessTripCounts[0]->first_quater}}</div>
          <div>{{$businessTripCounts[0]->second_quater}}</div>
          <div>{{$businessTripCounts[0]->third_quater}}</div>
          <div>{{$businessTripCounts[0]->fourth_quater}}</div>
          <div>154</div>

          <div>2</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('young_economists') }}">Институт Ёш иқтисодчилар мажлислари сони</a></div>
          <div>{{$youngEconomistCounts[0]->first_quater}}</div>
          <div>{{$youngEconomistCounts[0]->second_quater}}</div>
          <div>{{$youngEconomistCounts[0]->third_quater}}</div>
          <div>{{$youngEconomistCounts[0]->fourth_quater}}</div>
          <div>173</div>

          <div>3</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('training_courses') }}">Тренинг ўқув курси</a></div>
          <div>{{$trainingCourseCounts[0]->first_quater}}</div>
          <div>{{$trainingCourseCounts[0]->second_quater}}</div>
          <div>{{$trainingCourseCounts[0]->third_quater}}</div>
          <div>{{$trainingCourseCounts[0]->fourth_quater}}</div>
          <div>154</div>

          <div>4</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('higher_organs') }}">Таҳлилий материаллар</a></div>
          <div>{{$higherOrgans[0]->first_quater}}</div>
          <div>{{$higherOrgans[0]->second_quater}}</div>
          <div>{{$higherOrgans[0]->third_quater}}</div>
          <div>{{$higherOrgans[0]->fourth_quater}}</div>
          <div>160</div>

          @foreach($higherOrganCounts as $higherOrganCount)
          <div>4.{{$higherOrganCount->id}}</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('higher_organs') }}">{{$higherOrganCount->issuer_name}}</a></div>
          <div>{{$higherOrganCount->first_quarter}}</div>
          <div>{{$higherOrganCount->second_quarter}}</div>
          <div>{{$higherOrganCount->third_quarter}}</div>
          <div>{{$higherOrganCount->fourth_quarter}}</div>
          <div></div>
          @endforeach

          
      </div>
      </div>
    </div>
  </div>
@endsection
