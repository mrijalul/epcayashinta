@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Soal Latihan : {{ $soal_latihan->matpel }}</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="accordion" id="accordionSoalPilgan">
			<div class="card">
				{{-- pilihan ganda --}}
				<div class="card-header" id="SoalPilganID">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSoalPilganID" aria-expanded="true" aria-controls="collapseSoalPilganID">
							Input Soal Pilihan Ganda
						</button>
					</h2>
				</div>

				<div id="collapseSoalPilganID" class="collapse" aria-labelledby="SoalPilganID" data-parent="#accordionSoalPilgan">
					<div class="card-body">
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
						<form action="{{ route('soal.latihan.submit.soal.pilgan',$soal_latihan->id) }}" method="post">
							@csrf
							@include('soal_latihan.pilgan.tambahpertanyaan')
						</form>
					</div>
				</div>
				{{-- essay --}}
				<div class="card-header" id="SoalEssayID">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSoalEssayID" aria-expanded="true" aria-controls="collapseSoalEssayID">
							Input Soal Essay
						</button>
					</h2>
				</div>
				<div id="collapseSoalEssayID" class="collapse" aria-labelledby="SoalEssayID" data-parent="#accordionSoalPilgan">
					<div class="card-body">
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
						<form action="{{ route('soal.latihan.submit.soal.essay',$soal_latihan->id) }}" method="post">
							@csrf
							@include('soal_latihan.essay.tambahpertanyaan')
						</form>
					</div>
				</div>
  			</div>
		</div>
		<div class="p-3 bg-white rounded shadow-sm">
			<h6 class="border-bottom border-gray pb-2 mb-0">Soal Pilihan Ganda</h6>
			@php
			$i = 1;
			@endphp
			@foreach($pilgan as $pilgan)
			<div class="accordion" id="accordionPilgan{{ $pilgan->id }}">
				<div class="card">
					<div class="card-header" id="headingPilgan{{ $pilgan->id }}">
						<h2 class="mb-0">
							<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsePilgan{{ $pilgan->id }}" aria-expanded="false" aria-controls="collapsePilgan{{ $pilgan->id }}">{{ $i++ }}. {{ ucfirst($pilgan->question) }}</button>
						</h2>
					</div>
					<div id="collapsePilgan{{ $pilgan->id }}" class="collapse" aria-labelledby="headingPilgan{{ $pilgan->id }}" data-parent="#accordionPilgan{{ $pilgan->id }}">
						<div class="card-body">
							<span class="d-block">Pilihan A : {{ $pilgan->option1 }}</span>
							<span class="d-block">Pilihan B : {{ $pilgan->option2 }}</span>
							<span class="d-block">Pilihan C : {{ $pilgan->option3 }}</span>
							<span class="d-block">Pilihan D : {{ $pilgan->option4 }}</span>
							<span class="d-block">Pilihan E : {{ $pilgan->option5 }}</span>
							<span class="d-block">
								<h4>Jawaban : 
								@if($pilgan->answer == '1')
								Pilihan A
								@elseif($pilgan->answer == '2')
								Pilihan B
								@elseif($pilgan->answer == '3')
								Pilihan C
								@elseif($pilgan->answer == '4')
								Pilihan D
								@elseif($pilgan->answer == '5')
								Pilihan E
								@else
								@endif
								</h4>
							</span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="p-3 bg-white rounded shadow-sm">
			<h6 class="border-bottom border-gray pb-2 mb-0">Soal Essay</h6>
			@php
			$nmr = 1;
			@endphp
			@foreach($essay as $es)
			<div class="card">
				<div class="card-body">
					{{ $nmr++ }}. {{ ucfirst($es->pertanyaan) }}
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@include('layouts.mainmenu')
</div>
@endsection