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
							<div class="progress-bar bg-gradient1 progress-animated" style="width: 40%; height:10px;" role="progressbar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>
						<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
							<span>76 left from target</span>
							<h4 class="mb-0" id="total-masuk"></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4">
				<div class="card">
					<div class="card-body px-4 pb-0">
						<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Clients</h4>
						<div class="progress default-progress">
							<div class="progress-bar bg-gradient1 progress-animated" style="width: 40%; height:10px;" role="progressbar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>
						<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
							<span>76 left from target</span>
							<h4 class="mb-0">42</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4">
				<div class="card">
					<div class="card-body px-4 pb-0">
						<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Clients</h4>
						<div class="progress default-progress">
							<div class="progress-bar bg-gradient1 progress-animated" style="width: 40%; height:10px;" role="progressbar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>
						<div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
							<span>76 left from target</span>
							<h4 class="mb-0">42</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="row custom">

					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-12 col-sm-12">
										<div class="card">
											<div class="card-body">
												<div class="table-responsive">
													<table id="example" class="display" style="width: 100%">
														<thead>
															<tr>
																<th>Nama</th>
																<th>Status</th>
																<th>Tanggal</th>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!--**********************************
            Content body end
        ***********************************-->





<?php
include 'src/view/template/footer.php';
?>