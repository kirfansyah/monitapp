<?php
include 'src/view/template/header.php';
include 'src/view/template/navbar.php';
include 'src/view/template/sidebar.php';
?>


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-4 col-sm-4">
				<div class="card">
					<div class="card-body px-4 pb-0">
						<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Masuk</h4>
						<div class="progress default-progress">
							<div class="progress-bar bg-gradient1 progress-animated" id="persen-masuk" style="width: 10%; height:10px;" role="progressbar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>
						<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
							<span class="text-white">76 left from target</span>
							<h4 class="mb-0" id="total-masuk"></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4">
				<div class="card">
					<div class="card-body px-4 pb-0">
						<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Keluar</h4>
						<div class="progress default-progress">
							<div class="progress-bar bg-gradient1 progress-animated" id="persen-keluar" style="width: 10%; height:10px;" role="progressbar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>
						<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
							<span class="text-white">76 left from target</span>
							<h4 class="mb-0" id="total-keluar"></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4">
				<div class="card">
					<div class="card-body px-4 pb-0">
						<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total</h4>
						<div class="progress default-progress">
							<div class="progress-bar bg-gradient1 progress-animated" style="width: 40%; height:10px;" role="progressbar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>
						<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
							<span class="text-white">76 left from target</span>
							<h4 class="mb-0" id="total"></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card">
				<div class="card-header">
					<button type="button" id="tambah_data" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Data Manual</button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="display" style="width: 100%">
							<thead>
								<tr>
									<!-- <th>Nama</th> -->
									<th>Status</th>
									<th>Tanggal</th>
									<!-- <th>Aksi</th> -->
								</tr>
							</thead>
							<tbody>

							</tbody>

						</table>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>

<!--**********************************
            Content body end
        ***********************************-->


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
	<form id="form-data" class="needs-validation" novalidate="" action="">

		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<div class="form-validation">
						<div class="row">
							<div class="col-xl-12">
								<!-- <div class="mb-3 row">
									<label class="col-lg-4 col-form-label" for="validationCustom01">Nama
										<span class="text-danger">*</span>
									</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama.." required="">
										<input type="hidden" class="form-control" id="id_monitor" name="id_monitor" value="" placeholder="Masukkan nama.." required="">
										<div class="invalid-feedback">
											Please enter a name.
										</div>
									</div>
								</div> -->
								<div class="mb-3 row">
									<label class="col-lg-4 col-form-label" for="validationCustom02">Status <span class="text-danger">*</span>
									</label>
									<div class="col-lg-6">
										<select name="status" id="status" class="form-control" required="">
											<option value="">--Pilih--</option>
											<option value="1">Masuk</option>
											<option value="0">Keluar</option>
										</select>
										<div class="invalid-feedback">
											Please enter a status.
										</div>
									</div>
								</div>

							</div>

						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
					<button id="btn-save" type="submit" value="" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</form>
</div>




<?php
include 'src/view/template/footer.php';
?>