@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Modul Pembelajaran</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">Tambah Modul Pembelajaran</h4>
					
					@if($message = Session::get('success'))
						<div class="alert alert-primary" role="alert">
							{{ $message }}
						</div>
					@endif

					@if($errors->any())
					<div class="alert alert-danger" role="alert">
						@foreach ($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
					@endif

					<form action="{{ route('modul-pembelajaran.store') }}" method="post" enctype="multipart/form-data">

						@csrf
						
						<div class="mb-3">
							<label for="matapelajaran_id">Mata Pelajaran</label>
							<select name="matapelajaran_id" id="matapelajaran_id" class="form-control">
								@foreach ($mapel as $m)
									<option value="{{ $m->id }}">{{ $m->matpel }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-3">
							<label for="nama_modul">Nama Modul</label>
							<input type="text" class="form-control" id="nama_modul" placeholder="" name="nama_modul" required>
						</div>
						<div class="mb-3">
							<label for="file_modul">File Modul (pdf,docs,docx,doc only)</label>
							<input type="file" class="form-control" id="file_modul" placeholder="" name="file_modul" required accept=".pdf,.docs,.docx,.doc">
						</div>

						<button type="submit" class="btn btn-primary mb-3">Submit</button>
					</form>

				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card">
				<div class="card-body">
					<table id="modulid" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Mata Pelajaran</th>
								<th>Nama Modul</th>
								<th>File Modul</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
							$no = 1;	
							@endphp
							@foreach ($data as $modul)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $modul->matapelajaran_id }}</td>
								<td>{{ $modul->nama_modul }}</td>
								<td><a href="{{ route('modul-pembelajaran.download',$modul->id) }}" target="_blank" rel="noopener noreferrer">liat modul</a></td>
								<td>button</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.mainmenu')

  </div>
@endsection

@push('scripts')
<script>
	$( document ).ready(function() {
		$('#modulid').DataTable();
	} );
</script>
@endpush
