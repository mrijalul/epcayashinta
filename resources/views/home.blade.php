@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Main Menu</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3 text-center">
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<i class="fa fa-credit-card-alt fa-3x"></i>
							<h5 class="card-title">Simulasi Kas Kecil</h5>
							<a href="{{ route('kaskecil') }}" class="btn btn-primary">Akses Disini</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<i class="fa fa-book fa-3x"></i>
							<h5 class="card-title">Materi Pembelajaran</h5>
							<a href="{{ route('modul-pembelajaran.index') }}" class="btn btn-primary">Akses Disini</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<i class="fa fa-video-camera fa-3x"></i>
							<h5 class="card-title">Video Pembelajaran</h5>
							<a href="{{ route('video-pembelajaran.index') }}" class="btn btn-primary">Akses Disini</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<i class="fa fa-clipboard fa-3x"></i>
							<h5 class="card-title">Soal Latihan</h5>
							<a href="{{ route('soal.latihan.index') }}" class="btn btn-primary">Akses Disini</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<i class="fa fa-database fa-3x"></i>
							<h5 class="card-title">Rekap Nilai</h5>
							<a href="{{ route('rekap-nilai.nilai') }}" class="btn btn-primary">Akses Disini</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.mainmenu')

</div>
@endsection
