@extends('layouts.admin')
@section('content')

            <!-- UI Buttons-->
            <div class="mdl-cell mdl-cell--10-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp ui-buttons">
                    <div class="mdl-card__title">
					<div class="ui-section pull-left">
	<li class="mdl-list__item">
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-blue">
	<i class="material-icons">create</i>
    Create
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
					  <th>Nama Perusahaan</th>		
					  <th>Logo</th>
					  <th>Deskripsi</th>
					  <th>Kategori</th>
					  <th>Sub Kategori</th>
					  <th>Judul</th>
					  <th>Gaji</th>
					  <th>Tanggal Mulai</th>
					  <th>Email</th>
					  <th>Telepon</th>
					  <th>User</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($perusahaan as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
						<td>{{ $data->nama_perusahaan }}</td>
				    	<td><img src="{{asset('/assests/admin/images/lokerr'.$data->logo.'')}}" width="70" height="70"></td>
				    	<td>{{ $data->deskripsi }}</td>
				    	<td>{{ $data->kategori }}</td>
				    	<td>{{ $data->subkategori }}</td>
				    	<td>{{ $data->judul }}</td>
				    	<td>{{ $data->gaji }}</td>
				    	<td>{{ $data->tanggal_mulai }}</td>
				    	<td>{{ $data->email }}</td>
				    	<td>{{ $data->telepon }}</td>
				    	<td><p>{{ $data->User->email }}</p></td>
				    
           
<td>
	<a class="btn btn-warning" href="{{ route('perusahaan.edit',$data->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('perusahaan.show',$data->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('perusahaan.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
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