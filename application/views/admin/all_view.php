
<table id="dynamic-table" class="table table-striped table-bordered table-hover" >
	<thead>
		<tr>
			<th> No</th>
			<th> Judul Berita</th>
			<th> Isi Berita</th>
			<th> Kategori</th>
			<th> Gambar</th>
			<th> Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php 
				$no = 1;
				foreach ($data -> result() as $row) {
				?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->title; ?></td>
					<td><?php echo $row->content; ?></td>
					<td><?php echo $row->categori; ?></td>
					<td><?php echo '<img src="'.base_url().'uploads/' .$row->image.'" alt="" class="img-responsive"> '?></td>
					
					<td>
						<a href="<?php echo base_url()?>berita/edit/<?php echo $row->id; ?>">Edit</a>
						<a href="<?php echo base_url(); ?>berita/delete/<?php echo $row->id; 
						?>" OnClick="return confirm('Anda yakin ingin menghapus?')">Delete</a>
					</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
<p>
<a href="<?php echo base_url();?>berita/tambah/" class="btn btn-primary btn-small">Tambah Berita</a>
</p> 