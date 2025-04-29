@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Таҳлилий материаллар ўзгартириш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('higher_organs') }}"> Орқага</a>
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
      
  <form action="{{ route('higher_organs.update',$higherOrgans->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
          <div class="form-group col-lg-6">
            <label for="name"><b>Таҳлилий материал номи</b></label>
            <textarea name="name" id="summernote" class="form-control" required>{{ $higherOrgans->name }}</textarea>
        </div>

        <div class="form-group col-lg-2">
          <label for="who_given_id" class="form-label"><b>Асос</b></label>
          <select name="who_given_id" class="form-control" id="who_given_id" class="form-control" required>
              {{-- <option value="">-- Ким томонидан берилди --</option> --}}
              @foreach($whogivens as $whogiven)
                <option value="{{ $whogiven->id }}" 
                  {{ (old('who_given_id', $higherOrgans->who_given_id ?? '') == $whogiven->id) ? 'selected' : '' }}>
                  {{ $whogiven->name }}
                </option>
              @endforeach
          </select>
        </div>

        <div class="form-group col-lg-2">
          <label for="date"><b>Топшириқ санаси(ёки хатсиз)</b></label>
          <input type="date" name="date" id="date" class="form-control" value="{{ $higherOrgans->date }}" required>
        </div>

        <div class="form-group col-lg-2">
          <label for="ass_number"><b>Топшириқ рақами(ёки хатсиз)</b></label>
          <input type="number" name="ass_number" id="ass_number" class="form-control" value="{{ $higherOrgans->ass_number }}" min="0" required>
        </div>
        
        <div class="form-group col-lg-4">
          <label for="who_send"><b>Кимга юборилди</b></label>
          <input type="text" name="who_send" id="who_send" class="form-control" value="{{ $higherOrgans->who_send }}" required>
        </div>

        <div class="form-group col-lg-2">
          <label for="date"><b>Хат санаси</b></label>
          <input type="date" name="letter_date" id="letter_date" class="form-control" value="{{ $higherOrgans->letter_date }}" required>
        </div>

        <div class="form-group col-lg-2">
          <label for="letter_number"><b>Хат рақами</b></label>
          <input type="number" name="letter_number" id="letter_number" class="form-control" value="{{ $higherOrgans->letter_number }}" min="0" required>
        </div>

        <div class="form-group col-lg-6">
          <label for="direction"><b>Йўналиш</b></label>
          <input type="text" name="direction" id="direction" class="form-control" value="{{ $higherOrgans->direction }}" required>
        </div>

        <div class="form-group col-lg-2">
          <label for="type"><b>Сўровнома мавжудлиги (ҳа, йўқ)</b></label><br>
          {{-- <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required> --}}
          <select class="form-control" name="sorov" id="sorov">
              {{-- <option value="Ha">ҳа</option>
              <option value="Yo`q">йўқ</option> --}}
              <option value="Ha" {{ $higherOrgans->sorov == 'Ha' ? 'selected' : '' }}>ҳа</option>
              <option value="Yo`q" {{ $higherOrgans->sorov == 'Yo`q' ? 'selected' : '' }}>йўқ</option>
          </select>
        </div>

        {{-- <div class="form-group col-lg-4">
          <label for="country"><b>Давлат ёки ҳудуд</b></label>
          <input type="text" name="country" id="country" class="form-control" value="{{ $higherOrgans->country }}" required>
        </div> --}}
        <div class="form-group col-lg-2">
          <label for="regions_id" class="form-label"><b>Манзил(давлат ёки ҳудуд)</b></label>
          <select name="regions_id[]" class="form-control" id="regions_id" multiple required>
              <option value="">-- Xудуд --</option>
              @foreach($regions as $region)
                  <option value="{{ $region->id }}" 
                      {{ in_array($region->id, old('regions_id', $higherOrgans->regions->pluck('id')->toArray())) ? 'selected' : '' }}>
                      {{ $region->name }}
                  </option>
              @endforeach
          </select>
        </div>

        <div class="form-group col-lg-2">
          <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
          <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
              @foreach($quarters as $quarter)
                  {{-- <option value="{{ $quarter->id }}" {{ old('quarters_id') == $quarter->id ? 'selected' : '' }}>
                      {{ $quarter->name }}
                  </option> --}}
                  <option value="{{ $quarter->id }}" 
                    {{ (old('quarters_id', $higherOrgans->quarters_id ?? '') == $quarter->id) ? 'selected' : '' }}>
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
