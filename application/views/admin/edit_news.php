<script type="text/javascript">
	function cekform()
	{

		if (!$("#judul").val()) {
			alert('JUDUL TIDAK BOLEH KOSONG');
			$("#judul").focus()
			return false;
		}


		if (!$("#berita").val()) {
			alert('BERITA TIDAK BOLEH KOSONG');
			$("#berita").focus()
			return false;
		}

		if (!$("#kategori").val()) {
			alert('KATEGORI TIDAK BOLEH KOSONG');
			$("#kategori").focus()
			return false;
		}

		if (!$("#gambar").val()) {
			alert('GAMBAR TIDAK BOLEH KOSONG');
			$("#gambar").focus()
			return false;
		}
	}
</script>

<form class="form-horizontal" method="POST" action="<?php echo base_url();?>news/simpan" onsubmit="return cekform();">


	<div class="control-group">
			<label class="control-label">Judul :</label>
		<div class="controls">
				<input type="text" name="judul" id="judul" placeholder="judul" class="span5" value="<?php echo $judul; ?>">
		</div>
	</div>

	<div class="control-group">
			<label class="control-label">Berita :</label>
			<div class="controls">
				<input type="text" name="berita" id="berita" placeholder="berita" class="span5" value="<?php echo $berita; ?>">
		</div>
	</div>

<div class="control-group">
			<label class="control-label">Kategori :</label>
			<div class="controls">
				<input type="text" name="kategori" id="kategori" placeholder="kategori" class="span5" value="<?php echo $kategori; ?>">
		</div>
	</div>

<div class="control-group">
			<label class="control-label">Gambar :</label>
			<div class="controls">
				<input type="text" name="gambar" id="gambar" placeholder="gambar" class="span5" value="<?php echo $gambar; ?>">
		</div>
	</div>

	<p>
	<div>
		<button type="submit" class="btn btn-primary btn-small">Simpan</button>
		<a href="<?php echo base_url();?>news/" class="btn btn-primary btn-small"> Tutup </a>
	</div>
	</p>
</form>