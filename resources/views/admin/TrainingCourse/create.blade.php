@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Тренинг ўқув курсларини яратиш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('training_courses') }}"> Орқага</a>
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
      
  <form action="{{ route('training_courses.store') }}" method="POST">
    @csrf
        <div class="row">
          <div class="form-group col-lg-6">
            <label for="name">Тренинг/ўқув курси номи</label>
            <textarea name="name" id="summernote" class="form-control" required>{{ old('name') }}</textarea>
          </div>
          <div class="form-group col-lg-2">
              <label for="type">Тури(онлайн ёки оффлайн)</label>
              <select class="form-control" name="type" id="type">
                <option value="">-- Тури --</option>
                <option value="obline">Oнлайн</option>
                <option value="offline">Oффлайн</option>
              </select>
          </div>
          <div class="form-group col-lg-6">
            <label for="organizer">Ташкилотчи</label>
            <textarea name="organizer" id="summernote2" class="form-control" required>{{ old('organizer') }}</textarea>
          </div>
          <div class="form-group col-lg-2">
            <label for="start_date">Саналар</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
          </div>
          <div class="form-group col-lg-6">
            <label for="adress">Манзил
              (давлат ёки ҳудуд)</label>
            <input type="text" name="adress" id="adress" class="form-control" value="{{ old('adress') }}" required>
          </div>
          <div class="form-group col-lg-2">
            <label for="invite_count">Иштирок этган ходимлар сони</label>
            <input type="number" name="invite_count" id="invite_count" class="form-control" value="{{ old('invite_count') }}" min="0" required>
          </div>
          <div class="form-group col-lg-6">
            <label for="list_person">Иштирокличар рўйхати</label>
            <textarea name="list_person" id="summernote3" class="form-control" required>{{ old('list_person') }}</textarea>
          </div>
          <div class="form-group col-lg-2">
            <label for="quarters_id" class="form-label">Қайси чоракда</label>
            <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
                <option value="">-- Чораклар --</option>
                @foreach($quarters as $quarter)
                    <option value="{{ $quarter->id }}" {{ old('quarters_id') == $quarter->id ? 'selected' : '' }}>
                        {{ $quarter->name }}
                    </option>
                @endforeach
            </select>
          </div>
          <div class="card-action">
            <button class="btn btn-success">Жо`натиш</button>
          </div>
        </div>
  </form>    
@endsection
