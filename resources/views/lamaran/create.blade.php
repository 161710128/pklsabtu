@extends('layouts.app')
@section('content')
<main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">Please complete the form</div>
                </div>

                <div class="mdl-card__supporting-text">
                    <form action="#" class="form">
                        <div class="form__article">
                            <h3>Input data lamaran</h3>
			  	<form action="{{ route('lamaran.store') }}" method="post" >
			  		{{ csrf_field() }}
					  <div class="mdl-grid">
					  <div class="form-group {{ $errors->has('file_cv') ? ' has-error' : '' }}">
					  <label class="mdl-textfield__label" for="file_cv">File cv</label>
			  			<input type="file" name="file_cv" class="form-control"  required>
			  			@if ($errors->has('file_cv'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file_cv') }}</strong>
                            </span>
                        @endif
			  		</div>
					  </div>

			  		<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
			  			<label class="control-label">Status</label>	
			  			<input class="mdl-textfield__input" type="text" name="status"  required>
			  			@if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('lowongan_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Lowongan</label>	
			  			<select name="lowongan_id" class="form-control">
			  				@foreach($lowongan as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_lowongan }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('lowongan_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lowongan_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  	
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection