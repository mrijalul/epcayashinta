@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Soal Latihan : {{ $data->matpel }}</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		@if (auth()->user()->role == 1)
		<div class="card-deck mb-3">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-12">
						<form action="{{ route('soal.latihan.essay.submit.form',$data->id) }}" method="post">
							@csrf
							<div class="card-body card-wrapper-soal">
								<label for="basic-url">Soal </label>
								<div class="input-group mb-3">
									<textarea name="pertanyaan[]" class="form-control"></textarea>
									<button class="btn btn-primary add_pertanyaan" type="button">Tambah Soal</button>
								</div>
							</div>
							<button type="submit" class="btn btn-success text-center">Submit Soal</button>
						</form>
					</div>
				</div>
			</div>
		</div>	
		@endif
		<div class="card-deck mb-3">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="card-body">
							{{-- ======================================= --}}
							<div class="my-3 p-3 bg-white rounded shadow-sm">
								<h6 class="border-bottom border-gray pb-2 mb-0">Soal Essay</h6>
								<form action="{{ route('soal.latihan.essay.submit.jawaban',$data->id) }}" method="post">
									@csrf
									@php
										$no = 1;
									@endphp
									@foreach ($essays as $ess)
									<div class="media text-muted pt-3">
										<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
											<strong class="d-block text-gray-dark">{{ $no++ }}. {{ $ess->pertanyaan }}</strong>
											<input type="text" name="aidi[]" value="{{ $ess->id }}" style="display: none;">
											<textarea class="summernote" name="jawaban_essay[]">{{ old('jawaban_essay[]') }}</textarea>
										</p>
									</div>
									@endforeach
									<small class="d-block text-right mt-3">
										<button type="submit" class="btn btn-success">Kirim Jawaban</button>
									</small>
								</form>
							</div>
							{{-- ======================================= --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.mainmenu')

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
	$( document ).ready(function() {
		// text editor
		$('.summernote').summernote({
			toolbar: [
				['style',['bold', 'italic', 'underline','paragraph']]
			]
		});

		// auto generate field
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_pertanyaan'); //Add button selector
		var wrapper = $('.card-wrapper-soal'); //Input field wrapper 
		var fieldHTML = '<div><div class="input-group mb-3 hapus"><textarea name="pertanyaan[]" class="form-control"></textarea><button class="btn btn-danger remove_pertanyaan" type="button">Hapus Soal</button></div></div>'; //New input field html
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); //Add field html
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_pertanyaan', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
</script>
@endpush
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush