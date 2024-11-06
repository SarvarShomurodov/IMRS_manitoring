@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Учрашувлар қўшиш</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('meeting') }}"> Орқага</a>
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
                    <form action="{{ route('meeting.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="nameGoal"><b>Учрашув номи ва мақсади</b></label>
                                <textarea type="text" name="nameGoal" id="summernote" class="form-control" value="{{ old('nameGoal') }}" required></textarea>
                            </div>  

                            <div class="form-group col-lg-6">
                                <label for="organization"><b>Ташкилот</b></label>
                                <input type="text" name="organization" id="organization" class="form-control" value="{{ old('organization') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="basis"><b>Асос</b></label>
                                <input type="text" name="basis" id="basis" class="form-control" value="{{ old('basis') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="format"><b>Формат</b></label>
                                <input type="text" name="format" id="format" class="form-control" value="{{ old('format') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="address"><b>Манзил(давлат ёки ҳудуд)</b></label>
                                <textarea type="text" name="address" id="summernote2" class="form-control" value="{{ old('address') }}" required></textarea>
                            </div>
                            
                            <div class="form-group col-lg-2">
                                <label for="date"><b>Сана</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="list"><b>Иштирок этган Институт вакиллари рўйхати</b></label>
                                <textarea type="text" name="list" id="summernote3" class="form-control" value="{{ old('list') }}" required></textarea>
                            </div> 

                            <div class="form-group col-lg-2">
                                <label for="quarters_id" class="form-label"><b>Чораклар</b></label>
                                <select name="quarters_id" id="quarters_id" class="form-control" required>
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
                            <button type="submit" class="btn btn-success">Жо`натиш</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
