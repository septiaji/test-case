<div class="container-fluid">
	<h3><i class="fas fa-edit"></i> Edit Data Barang</h3>

	<?php foreach ($barang as $brg) : ?>
		<form action="<?php echo base_url() . 'admin/data_barang/update' ?>" method="POST">
			<div class="form-group">
				<label for="">Nama Barang</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $brg->nama ?>" required>
			</div>
			<div class="form-group">
				<label for="">Keterangan</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $brg->id ?>">
				<input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>" required>
			</div>
			<div class="form-group">
				<label for="">Kategori</label>
				<input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
			</div>
			<div class="form-group">
				<label for="">Harga</label>
				<input type="number" name="harga" class="form-control" value="<?php echo $brg->harga ?>" required>
			</div>
			<div class="form-group">
				<label for="">Stok</label>
				<input type="number" name="stok" class="form-control" value="<?php echo $brg->stok ?>" required>
			</div>

			<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

		</form>

	<?php endforeach ?>

</div>
