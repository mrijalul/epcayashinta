@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Soal Latihan : {{ $soal_latihan->matpel }}</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">Tambah Video Pembelajaran</h4>
					
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
		</div>
		<div class="p-3 bg-white rounded shadow-sm">
			<h6 class="border-bottom border-gray pb-2 mb-0">Soal Pilihan Ganda</h6>
			@php
			$i = 1;
			@endphp
			@foreach($pilgan as $pilgan)
			<div class="media text-muted pt-3">
				<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					<div class="d-flex justify-content-between align-items-center w-100">
						<strong class="text-gray-dark"><h3>{{ $i++ }}. {{ $pilgan->question }}</h3></strong>
					</div>
					<span class="d-block">Pilihan A : {{ $pilgan->option1 }}</span>
					<span class="d-block">Pilihan B : {{ $pilgan->option2 }}</span>
					<span class="d-block">Pilihan C : {{ $pilgan->option3 }}</span>
					<span class="d-block">Pilihan D : {{ $pilgan->option4 }}</span>
					<span class="d-block">Pilihan E : {{ $pilgan->option5 }}</span>
					<span class="d-block"> <h4>Jawaban : 
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
			@endforeach
		</div>
	</div>
	@include('layouts.mainmenu')
</div>
@endsection