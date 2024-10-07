@extends('layouts.app-admin')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
           <div class="card-title d-flex justify-content-between align-items-center">
             <h3>Таҳлилий материаллар ўзгартириш</h3>
             <a href="{{ url('higher_organs') }}" class="btn btn-primary text-light ms-auto">Орқага</a>
           </div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('higher_organs.update',$higherOrgans->id) }}" method="POST">
              @csrf
              <div class="col-md-6 mx-5">
                <div class="form-group">
                    <label for="name"><b>Таҳлилий материал номи</b></label>
                    <textarea name="name" id="name" class="form-control" required>{{ $higherOrgans->name }}</textarea>
                </div>

                <div class="form-group">
                  <label for="who_given_id" class="form-label"><b>Асос</b></label>
                  <select name="who_given_id" class="form-control" id="who_given_id" class="form-control" required>
                      <option value="">-- Ким томонидан берилди --</option>
                      @foreach($whogivens as $whogiven)
                          <option value="{{ $whogiven->id }}" {{ old('whogiven') == $whogiven->id ? 'selected' : '' }}>
                              {{ $whogiven->name }}
                          </option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group col-lg-4">
                  <label for="date"><b>Топшириқ санаси(ёки хатсиз)</b></label>
                  <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="ass_number"><b>Топшириқ рақами(ёки хатсиз)</b></label>
                  <input type="number" name="ass_number" id="ass_number" class="form-control" value="{{ old('ass_number') }}" min="0" required>
                </div>
                
                <div class="form-group">
                  <label for="who_send"><b>Кимга юборилди</b></label>
                  <input type="text" name="who_send" id="who_send" class="form-control" value="{{ old('who_send') }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="date"><b>Хат санаси</b></label>
                  <input type="date" name="letter_date" id="letter_date" class="form-control" value="{{ old('letter_date') }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="letter_number"><b>Хат рақами</b></label>
                  <input type="number" name="letter_number" id="letter_number" class="form-control" value="{{ old('ass_number') }}" min="0" required>
                </div>

                <div class="form-group">
                  <label for="direction"><b>Йўналиш</b></label>
                  <input type="text" name="direction" id="direction" class="form-control" value="{{ old('direction') }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="type"><b>Сўровнома мавжудлиги (ҳа, йўқ)</b></label><br>
                  {{-- <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required> --}}
                  <select class="form-control" name="sorov" id="sorov">
                      <option value="Ha">ҳа</option>
                      <option value="Yo`q">йўқ</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="country"><b>Давлат ёки ҳудуд</b></label>
                  <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="ball"><b>Иштирок этган ходимлар ва уларнинг қўшган ҳиссаси (балл)</b></label>
                  <input type="number" name="ball" id="ball" class="form-control" value="{{ old('ball') }}" min="0" required>
                </div>

                <div class="form-group col-lg-4">
                  <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
                  <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
                      <option value="">-- Чораклар --</option>
                      @foreach($quarters as $quarter)
                          <option value="{{ $quarter->id }}" {{ old('quarters_id') == $quarter->id ? 'selected' : '' }}>
                              {{ $quarter->name }}
                          </option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-success">Жо`натиш</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
