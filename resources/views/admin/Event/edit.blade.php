@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Институт тадбирлари ўзгартириш</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('event') }}"> Орқага</a>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('event.update',$events->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name"><b>Тадбир номи</b></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $events->name }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="type"><b>Тадбир тури</b></label>
                                <input type="text" name="type" id="type" class="form-control" value="{{ $events->type }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="basis"><b>Асос</b></label>
                                <input type="text" name="basis" id="basis" class="form-control" value="{{ $events->basis }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="organizer"><b>Ташкилотчи</b></label>
                                <input type="text" name="organizer" id="organizer" class="form-control" value="{{ $events->organizer }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="goal"><b>Максад</b></label>
                                <textarea type="text" name="goal" id="summernote" class="form-control" value="" required>{{ $events->goal }}</textarea>
                            </div>            

                            <div class="form-group col-lg-2">
                                <label for="date"><b>Тадбир санаси</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $events->date }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="place"><b>Тадбир ўтказилган жой</b></label>
                                <input type="text" name="place" id="place" class="form-control" value="{{ $events->place }}" required>
                            </div>
              
                            <div class="form-group col-lg-2">
                              <label for="foreignNum"><b>Иштирокчилар сони (маҳаллий)</b></label>
                              <input type="number" name="foreignNum" id="foreignNum" class="form-control" value="{{ $events->foreignNum }}" min="0" required>
                            </div>
                            
                            <div class="form-group col-lg-2">
                              <label for="localNum"><b>Иштирокчилар сони (чет эл вакиллари)</b></label>
                              <input type="number" name="localNum" id="localNum" class="form-control" value="{{ $events->localNum }}" min="0" required>
                            </div>

                              <div class="form-group col-lg-6">
                                <label for="result"><b>Натижа</b></label>
                                <textarea type="text" name="result" id="summernote2" class="form-control" value="" required>{{ $events->result }}</textarea>
                              </div>

                            <div class="form-group col-lg-2">
                                <label for="quarters_id" class="form-label"><b>Чораклар</b></label>
                                <select name="quarters_id" id="quarters_id" class="form-control" required>
                                    <option value="">-- Чораклар --</option>
                                    @foreach($quarters as $quarter)
                                    <option value="{{ $quarter->id }}" 
                                        {{ (old('quarters_id', $events->quarters_id ?? '') == $quarter->id) ? 'selected' : '' }}>
                                        {{ $quarter->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Жо`натиш</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
