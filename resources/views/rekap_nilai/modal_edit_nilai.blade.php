<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uraian{{ $uraian->id }}">
	Edit Nilai
</button>

<div class="modal fade" id="uraian{{ $uraian->id }}" tabindex="-1" aria-labelledby="uraian{{ $uraian->id }}Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="uraian{{ $uraian->id }}Label">{{ $uraian->useranswer->name }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('rekap-nilai.update',$uraian->id) }}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="nilai_siswa">Nilai</label>
						<input type="number" class="form-control" id="nilai_siswa" name="nilai" value="{{ $uraian->nilai }}">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update Nilai Siswa</button>
			</div>
				</form>
		</div>
	</div>
</div>