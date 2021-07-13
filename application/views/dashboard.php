<div class="container-fluid">

	<div class="row text-center mt-4">

		<?php foreach ($barang as $brg) : ?>

			<div class="card ml-3 mt-2" style="width: 16rem;">
				<img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="card-img-top" alt="">
				<div class="card-body">
					<h5 class="card-title mb-1"><?php echo $brg->nama ?></h5>
					<span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></span><br>
					<small><?php echo $brg->keterangan ?></small><br><br>
					<?php echo anchor('dashboard/tambah_ke_keranjang/' . $brg->id, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>
					<?php echo anchor('dashboard/detail/' . $brg->id, '<div class="btn btn-sm btn-success">Detail</div>') ?>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
	<!-- Footer -->
	<footer class="sticky-footer bg-white">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>2019 &copy; PT Majoo Teknologi Indonesia</span>
			</div>
		</div>
	</footer>
	<!-- End of Footer -->
</div>
