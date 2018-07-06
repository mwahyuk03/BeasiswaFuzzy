<?php
	defined('BASEPATH') OR exit('Akses langsung tidak diperbolehkan');
	//echo validation_errors();
?>

<section class="container-fluid">
	<div class="row">
		<div class="form-input clearfix">
			<div class="col-md-12">
	
				<div class="panel panel-primary">
					<div class="panel-heading">Tambah Data</div>
					<div class="panel-body">
						<!-- <form action="<?php //echo base_url('home/tambahmobil'); ?>" method="post" class="form-horizontal"> -->
						
						<?php echo form_open('home/tambahmhs', ['class' => 'form-horizontal', 'method' => 'post']); ?>
							<div class="form-group <?php echo (form_error('id') != '') ? 'has-error has-feedback' : '' ?>">
								
							
							</div>

							<div class="form-group">
								<label for="nama" class="control-label col-sm-2">Nama </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>">
									<?php echo form_error('nama'); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="ipk" class="control-label col-sm-2">IPK </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="ipk" value="<?php echo set_value('ipk'); ?>">
									<?php echo form_error('ipk'); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="gaji" class="control-label col-sm-2">Gaji </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="gaji" value="<?php echo set_value('gaji'); ?>">
									<?php echo form_error('gaji'); ?>
								</div>
							</div>

							<div class="form-group">
								<div class="btn-form col-sm-12">
									<a href="<?php echo base_url('home/lihatdata'); ?>"><button type="button" class='btn btn-default'>Batal</button></a>
									<button type="submit" class='btn btn-primary'>Simpan</button>
								</div>
							</div>
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>