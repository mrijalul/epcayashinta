@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Main Menu</h1>
</div>
<div class="row">
    <div class="col-md-8 blog-main">
		<div class="card-deck mb-3 text-center">
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<h5 class="card-title">Simulasi Kas Kecil</h5>
							<button class="btn btn-primary">Akses Disini</button>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<h5 class="card-title">Modul Pembelajaran</h5>
							<button class="btn btn-primary">Akses Disini</button>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<h5 class="card-title">Video Pembelajaran</h5>
							<button class="btn btn-primary">Akses Disini</button>
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
							<h5 class="card-title">Soal Latihan</h5>
							<button class="btn btn-primary">Akses Disini</button>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							<h5 class="card-title">Rekap Nilai</h5>
							<button class="btn btn-primary">Akses Disini</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<aside class="col-md-4 blog-sidebar">
		<div class="card" style="width: 18rem;">
			<div class="card-header">
				Main Menu
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><a href="">Simulasi Kas Kecil</a></li>
				<li class="list-group-item"><a href="">Modul Pembelajaran</a></li>
				<li class="list-group-item"><a href="">Video Pembelajaran</a></li>
				<li class="list-group-item"><a href="">Soal Latihan</a></li>
				<li class="list-group-item"><a href="">Rekap Nilai</a></li>
			</ul>
		</div>
	</aside>

  </div>
@endsection
