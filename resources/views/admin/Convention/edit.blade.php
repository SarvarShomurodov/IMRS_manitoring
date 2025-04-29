@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Иштирок этган анжуманлар ўзгартириш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('conventions') }}"> Орқага</a>
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
<form action="{{ route('conventions.update',$conventions->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="form-group col-lg-6">
          <label for="name"><b>Анжуман номи</b></label>
          <textarea name="name" id="summernote" class="form-control" required>{{ $conventions->name }}</textarea>
      </div>
      <div class="form-group col-lg-4">
        <label for="who_given_id" class="form-label"><b>Асос</b></label>
        <select name="who_given_id" class="form-control" id="who_given_id" class="form-control" required>
            {{-- <option value="">{{ $conventions->whogiven->name }}</option> --}}
            @foreach($whogivens as $whogiven)
                {{-- <option value="{{ $whogiven->id }}" {{ old('whogiven') == $whogiven->id ? 'selected' : '' }}>
                    {{ $whogiven->name }}
                </option> --}}
                <option value="{{ $whogiven->id }}" 
                    {{ (old('who_given_id', $conventions->who_given_id ?? '') == $whogiven->id) ? 'selected' : '' }}>
                    {{ $whogiven->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-lg-2">
        <label for="type_id" class="form-label"><b>Тури</b></label>
        <select name="type_id" id="type_id" class="form-control" required>
            @foreach($publishTypes as $type)
                <option value="{{ $type->id }}" 
                    {{ (old('type_id', $conventions->type_id ?? '') == $type->id) ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
      <div class="form-group col-lg-4">
        <label for="date"><b>Ташкилотчи</b></label>
        <input type="text" name="organizer" id="organizer" class="form-control" value="{{  $conventions->organizer }}" required>
      </div>
      <div class="form-group col-lg-2">
        <label for="date"><b>Саналар</b></label>
        <input type="date" name="date" id="date" class="form-control" value="{{  $conventions->date }}" required>
      </div>
      <div class="form-group col-lg-2">
        <label for="regions_id" class="form-label"><b>Манзил(давлат ёки ҳудуд)</b></label>
        <select name="regions_id[]" class="form-control" id="regions_id" multiple required>
            <option value="">-- Xудуд --</option>
            @foreach($regions as $region)
                <option value="{{ $region->id }}" 
                    {{ in_array($region->id, old('regions_id', $conventions->regions->pluck('id')->toArray())) ? 'selected' : '' }}>
                    {{ $region->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-lg-2">
        <label for="letter_number"><b>Иштирок этган ходимлар сони</b></label>
        <input type="number" name="employees_count" id="employees_count" class="form-control" value="{{  $conventions->employees_count }}" min="0" required>
      </div>
      <div class="form-group col-lg-6">
        <label for="name"><b>Иштирокчилар рўйхати</b></label>
        <textarea name="list" id="summernote2" class="form-control" required>{{  $conventions->list }}</textarea>
    </div>
      <div class="form-group col-lg-2">
        <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
        <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
            @foreach($quarters as $quarter)
              <option value="{{ $quarter->id }}" 
                {{ (old('quarters_id', $conventions->quarters_id ?? '') == $quarter->id) ? 'selected' : '' }}>
                {{ $quarter->name }}
              </option>
            @endforeach
        </select>
      </div>
      <div class="card-action">
        <button class="btn btn-success">Таҳрирлаш</button>
      </div>
  </div>
</form>
@endsection
