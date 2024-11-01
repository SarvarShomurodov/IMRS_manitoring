@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Ёш Иқтисодчиларни янгилаш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('young_economists') }}"> Орқага</a>
      </div>
  </div>
</div>
<hr>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
      
<form action="{{ route('young_economists.update',$youngEconomists->id) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="row">
        <div class="form-group col-lg-6">
          <label for="name"><b>Маърузачининг ф.и.ш.</b></label>
          <input type="text" name="name" id="name" class="form-control" value="{{ $youngEconomists->name }}" required>
        </div>

        <div class="form-group col-lg-6">
          <label for="name"><b>Маърузачи лавозими (докторант, таянч докторант, мустақил изланувчи, илмий ходим)</b></label>
          <input type="text" name="position" id="position" class="form-control" value="{{ $youngEconomists->position }}" required>
        </div>

        <div class="form-group col-lg-6">
         <label for="goal"><b>Иштирокчилар руйҳати (маҳаллий)</b></label>
         <textarea name="list_person_local" id="summernote" class="form-control" required>{{ $youngEconomists->list_person_local }}</textarea>
        </div>

        <div class="form-group col-lg-2">
          <label for="start_date"><b>Мажлис санаси</b></label>
          <input type="date" name="date" id="date" class="form-control" value="{{ $youngEconomists->date }}" required>
        </div>

        <div class="form-group col-lg-6">
          <label for="goal"><b>Иштирокчилар рўйхати (чет эл вакиллари)</b></label>
          <textarea name="list_person_no_local" id="summernote2" class="form-control" required>{{ $youngEconomists->name }}</textarea>
        </div>
        <div class="form-group col-lg-2">
         <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
         <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
             @foreach($quarters as $quarter)
                <option value="{{ $quarter->id }}" 
                 {{ (old('quarters_id', $youngEconomists->quarters_id ?? '') == $quarter->id) ? 'selected' : '' }}>
                 {{ $quarter->name }}
                </option>
             @endforeach
         </select>
       </div>
     </div>
     <div class="card-action">
        <button type="submit" class="btn btn-success">Таҳрирлаш</button>
    </div>
</form>    
@endsection
