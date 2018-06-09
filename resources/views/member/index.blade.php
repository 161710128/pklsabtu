@extends('layouts.admin')
@section('content')
<!-- UI Buttons-->
<div class="mdl-cell mdl-cell--10-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp ui-buttons">
                    <div class="mdl-card__title">
					<div class="ui-section pull-left">
	<li class="mdl-list__item">
	<div class="panel-title pull-right"><a href="{{ route('member.create') }}">Tambah</a>
			  	</div>
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue">
    </button>
    </li>
                    </div>
					</div>
                    <div class="mdl-card__supporting-text">
    
			  <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone ">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp projects-table">
                        <thead>
                        <tr>
			  		  <th>No</th>
					  <th>Foto</th>
					  <th>Alamat</th>
					  <th>Email</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($member as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
							<td><img src="{{ asset('assests/admin/images/lokerr/'.$data->logo) }}" style="max-height:70px;max-width:70px;margin-top:7px;" /></td>
				    	<td>{{ $data->alamat }}</td>
				    	<td><p>{{ $data->User->email }}</p></td>
<td>
	<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-light-blue" href="{{ route('member.edit',$data->id) }}">Edit
	</a>
</td>
<td>
	<a href="{{ route('member.show',$data->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-yellow"">Show</a>
</td>
<td>
	<form method="post" action="{{ route('member.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-red" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection