@php
$nmr = 1;
@endphp
@foreach($pilgan as $key => $p)
	<h4 class="mb-3">{{ $nmr++ }}. {{ $p->question }}</h4>
	<div class="d-block my-3">
		<div class="custom-control custom-radio">
			<input id="pilihanA{{ $p->id }}" name="opsi[{{ $key }}]" type="radio" class="custom-control-input" value="1">
			<label class="custom-control-label" for="pilihanA{{ $p->id }}">{{ $p->option1 }}</label>
		</div>
		<div class="custom-control custom-radio">
			<input id="pilihanB{{ $p->id }}" name="opsi[{{ $key }}]" type="radio" class="custom-control-input" value="2">
			<label class="custom-control-label" for="pilihanB{{ $p->id }}">{{ $p->option2 }}</label>
		</div>
		<div class="custom-control custom-radio">
			<input id="pilihanC{{ $p->id }}" name="opsi[{{ $key }}]" type="radio" class="custom-control-input" value="3">
			<label class="custom-control-label" for="pilihanC{{ $p->id }}">{{ $p->option3 }}</label>
		</div>
		<div class="custom-control custom-radio">
			<input id="pilihanD{{ $p->id }}" name="opsi[{{ $key }}]" type="radio" class="custom-control-input" value="4">
			<label class="custom-control-label" for="pilihanD{{ $p->id }}">{{ $p->option4 }}</label>
		</div>
		<div class="custom-control custom-radio">
			<input id="pilihanE{{ $p->id }}" name="opsi[{{ $key }}]" type="radio" class="custom-control-input" value="5">
			<label class="custom-control-label" for="pilihanE{{ $p->id }}">{{ $p->option5 }}</label>
		</div>
		<input type="text" name="no_soal[]" value="{{ $p->id }}" style="display: none;">
		<input type="text" name="soal[]" value="{{ $p->question }}" style="display: none;">
		<input type="text" name="jawaban[]" value="{{ $p->answer }}" style="display: none;">
	</div>
	<hr class="mb-4">
@endforeach