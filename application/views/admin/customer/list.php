<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
                    <a href="<?php echo site_url('admin/customers/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										
                                        <th>Name</th>
										<th>Email</th>
										<th>No Hp</th>
										<th>Price</th>
										<th>Bukti</th>
                                        <th>QRcode</th>
                                        <th>Enter</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($customers as $product): ?>
                                <tr>
									
                                    <td >
                                        <?php echo $product->name ?>
                                    </td>
                                    <td >
                                        <?php echo $product->email ?>
                                    </td>
                                    <td>
                                        <?php echo $product->no_hp ?>
                                    </td>
                                    <td>
                                        <?php echo $product->payment ?>
                                    </td>
									<td>
										<img src="<?php echo base_url('upload/customer/'.$product->bukti_pembayaran) ?>" width="64" />
                                    </td>
                                    <td>
										<img src="<?php echo 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data='.$product->customer_id?>" width="64" />
                                    </td>
                                    <td>
										<?php echo $product->status; 
									
											if( $product->status == 'verified'){
												$this->load->library('Ci_phpmailer/Ci_phpmailer');
												try 
													{
														// assume you are using gmail
														$this->ci_phpmailer->setServer('smtp.gmail.com');
														$this->ci_phpmailer->setAuth('developercircle12', '4kuGanteng');
														$this->ci_phpmailer->setAlias('E-Ticketing@gmail.com', 'Emir Ganteng'); // you can use whatever alias you want
														$this->ci_phpmailer->sendMessage($product->email, 'sertifikat Peserta', " ".base_url('upload/customer/'.$product->bukti_pembayaran));    
														
													} 
													catch (Exception $e)
													{
														$this->ci_phpmailer->displayError();
													}
											}
										?>
                                    </td>
									<td>
                                        <?php echo $product->enter ?>
                                    </td>
                                    <td >
											<a href="<?php echo site_url('admin/customers/edit/'.$product->customer_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/customers/delete/'.$product->customer_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
										
                                </tr>
                                <?php endforeach;?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
	<script>
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
	}
	</script>
</body>

</html>