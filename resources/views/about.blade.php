@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">About</h1>
</div>
<div class="row gutters-sm">
	<div class="col-md-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-column align-items-center text-center">
					<img src="{{ asset('images/yashinta.jpg') }}" alt="Admin" class="rounded-circle" width="150">
					<div class="mt-3">
						<h4>EPCA</h4>
						<p class="text-secondary mb-1"><i>(Educative Petty Cash Application)</i></p>
						<p class="text-muted font-size-sm">merupakan aplikasi pengelola kas kecil sebagai alternatif media pembelajaran pada mapel Otomatisasi Tata Kelola Keuangan.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<h6 class="mb-0">Nama</h6>
					</div>
					<div class="col-sm-9 text-secondary">
						YASHINTA ULA QOMARINA
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
						<h6 class="mb-0">NIM</h6>
					</div>
					<div class="col-sm-9 text-secondary">
						170412617579
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
						<h6 class="mb-0">Prodi</h6>
					</div>
					<div class="col-sm-9 text-secondary">
						S1 Pendidikan Administrasi Perkantoran
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
						<h6 class="mb-0">Email</h6>
					</div>
					<div class="col-sm-9 text-secondary">
						Yshinta1999@gmail.com
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
	@include('layouts.mainmenu')
</div>
@endsection