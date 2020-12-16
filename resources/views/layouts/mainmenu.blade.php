<aside class="col-md-4 blog-sidebar" style="height: 68vh;">
	@if(isset($menukaskecil))
	<div class="card" style="width: 18rem;">
		<div class="card-header">
			Menu Kas Kecil
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><a href="{{route('kaskecil')}}">Kembali</a></li>
			<li class="list-group-item"><a href="{{route('pembentukandana', [$menukaskecil])}}">Pembentukan Dana Kas Kecil</a></li>
			<li class="list-group-item"><a href="{{route('pengajuankaskecil', [$menukaskecil])}}">Pengajuan Pembayaran Melalui Kas Kecil</a></li>
			<li class="list-group-item"><a href="{{route('listpengajuankaskecil', [$menukaskecil])}}">List Pengeluaran Kas Kecil</a></li>
			<li class="list-group-item"><a href="{{route('pingisiankembali', [$menukaskecil])}}">Pengisian Kembali kas kecil</a></li>
			<li class="list-group-item"><a href="{{route('jurnalkaskecil', [$menukaskecil])}}">Jurnal Kas Kecil</a></li>
			<li class="list-group-item"><a href="{{route('bukukaskecil', [$menukaskecil])}}">Buku Kas Kecil</a></li>
			
		</ul>
	</div>
	<p></p>
	@endif
	<div class="card" style="width: 18rem;">
		<div class="card-header">
			<a href="{{ route('home') }}">Main Menu</a>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><a href="{{ route('kaskecil') }}">Simulasi Kas Kecil</a></li>
			<li class="list-group-item"><a href="{{ route('modul-pembelajaran.index') }}">Materi Pembelajaran</a></li>
			<li class="list-group-item"><a href="{{ route('video-pembelajaran.index') }}">Video Pembelajaran</a></li>
			<li class="list-group-item"><a href="{{ route('soal.latihan.index') }}">Soal Latihan</a></li>
			<li class="list-group-item"><a href="#">Rekap Nilai</a></li>
		</ul>
	</div>
</aside>