@php
$nmr = 1;
@endphp
@foreach($essay as $key => $p)
	<h4 class="mb-3">{{ $nmr++ }}. {{ $p->pertanyaan }}</h4>
	<div class="d-block my-3">
		<div class="form-group">
			<textarea class="form-control" id="jawaban{{ $p->id }}" name="jawaban[]" rows="3"></textarea>
		</div>
		<input type="text" name="no_soal[]" value="{{ $p->id }}" style="display: none;">
		<input type="text" name="soal[]" value="{{ $p->pertanyaan }}" style="display: none;">
	</div>
	<hr class="mb-4">
@endforeach