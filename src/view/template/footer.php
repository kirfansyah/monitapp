</div>
</div>

<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
	<div class="copyright">
		<p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
	</div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/chart.js/Chart.bundle.min.js"></script>
<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<!-- Apex Chart -->
<!-- <script src="vendor/apexchart/apexchart.js"></script> -->

<script src="vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<script src="vendor/peity/jquery.peity.min.js"></script>
<!-- Dashboard 1 -->
<script src="js/dashboard/dashboard-1.js"></script>

<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>

<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<script src="vendor/owl-carousel/owl.carousel.js"></script>

<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>
<script src="js/demo.js"></script>
<!-- <script src="js/styleSwitcher.js"></script> -->

<script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>

<script>
	$(document).ready(function() {
		// Menghancurkan DataTable sebelumnya (jika ada)
		$('#example').DataTable().destroy();
		$('#nama').val('');
		$('#status').val('');

		$(document).on('click', '#tambah_data', function() {
			$('#nama').val('');
			$('#status').val('');
			$('#btn-save').val('add')
		})



		// Menggunakan DataTables untuk menampilkan data dalam tabel
		var dataTable = $('#example').DataTable({
			processing: false,
			serverSide: true,
			ajax: {
				url: 'src/controller/getdata.php', // Nama file PHP backend
				type: 'GET',
				dataType: 'json'
			},
			columns: [
				// {
				// 	data: 'nama',
				// 	orderable: true
				// },
				{
					data: 'status',
					orderable: true,
					render: function(data, type, row) {
						// Mengganti nilai status menjadi 'masuk' atau 'keluar'
						return data == '1' ? 'masuk' : 'keluar';
					}
				},
				{
					data: 'tanggal',
					orderable: true
				},
				// {

				// 	orderable: true,
				// 	render: function(data, type, row) {
				// 		// Mengganti nilai status menjadi 'masuk' atau 'keluar'
				// 		return `<button id="edit" class="badge badge-success btn-edit" data-id="${row.id_monitor}">Edit</button>
				// 				<button id="Hapus" class="badge badge-danger btn-delete" data-id="${row.id_monitor}">Delete</button>`;
				// 	}
				// },
				// Tambahkan kolom-kolom lain sesuai dengan struktur tabel
			]
		});

		// Mengatur refresh setiap detik
		setInterval(function() {
			// Reload data dari server tanpa menghancurkan tabel
			dataTable.ajax.reload(null, false); // Parameter kedua false untuk mempertahankan filter
			getTotalMasuk()
			getTotalKeluar()
			getTotalKeseluruhan()
		}, 1000); // Refresh setiap 1 detik

		function getTotalMasuk() {
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: 'src/controller/getTotalMasuk.php',
				success: function(data) {
					$('#total-masuk').html(data.total_masuk)
					$('#persen-masuk').attr('style', `width: ${data.persentase_masuk}%; height:10px;`)
				}
			})
		}

		function getTotalKeluar() {
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: 'src/controller/getTotalKeluar.php',
				success: function(data) {
					// console.log('data');
					$('#total-keluar').html(data.total_keluar)
					$('#persen-keluar').attr('style', `width: ${data.persentase_keluar}%; height:10px;`)

				},
				error: function() {
					console.log('error');
				}
			})
		}

		function getTotalKeseluruhan() {
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: 'src/controller/getTotalKeseluruhan.php',
				success: function(data) {
					$('#total').html(data)
				}
			})
		}

		$(document).on('submit', '#form-data', function(e) {
			e.preventDefault()
			var nama = $('#nama').val();
			var status = $('#status').val();
			var val_btn = $('#btn-save').val();
			var id_monitor = $('#id_monitor').val();
			console.log('id ', id_monitor);

			if (nama.trim() != '' && status.trim != '' && val_btn == 'add') {
				$.ajax({
					type: 'GET',
					url: 'src/controller/addData.php',
					dataType: 'json',
					data: {
						nama: nama,
						status: status,
					},
					success: function(response) {
						console.log(response);
						if (response.status == 200) {
							Swal.fire({
								title: "Berhasil!",
								text: response.message,
								icon: "success"
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "Something went wrong!",
							});
						}
					},
					error: function(error) {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Something went wrong!",
						});
					}
				});

			} else if (nama.trim() != '' && status.trim != '' && val_btn == 'edit') {
				$.ajax({
					type: 'GET',
					url: 'src/controller/updateData.php',
					dataType: 'json',
					data: {
						nama: nama,
						status: status,
						id: id_monitor,
					},
					success: function(response) {
						console.log(response);
						if (response.status == 200) {
							Swal.fire({
								title: "Berhasil!",
								text: response.message,
								icon: "success"
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "Something went wrong!",
							});
						}
					},
					error: function(error) {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Something went wrong!",
						});
					}
				});
			} else {
				Swal.fire({
					icon: "error",
					title: "Data Masih Kosong...",
					text: "Isi data terlebih dahulu!",
				});
			}
		})


		// Handle klik tombol Edit
		$(document).on('click', '.btn-edit', function() {
			var id = $(this).data('id');
			var val_btn = $('#btn-save').val('edit')
			if (id != '') {
				$.ajax({
					type: 'GET',
					url: 'src/controller/get_data_byid.php', // Ganti dengan file PHP backend yang sesuai
					data: {
						id: id
					},
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if (data.status === 200) {
							$('#nama').val(data.data.nama)
							$('#status').val(data.data.status)
							$('#id_monitor').val(data.data.id_monitor)
							$('#exampleModalCenter').modal('show')
							console.log(data.data.id_monitor);

						}

					},
					error: function(data) {

					}
				});
			}

			// console.log('Edit ID: ' + id);
		});
		// Handle klik tombol Delete
		$(document).on('click', '.btn-delete', function() {
			var id = $(this).data('id');
			var val_btn = $('#btn-save').val('edit')
			if (id != '') {

				$.ajax({
					type: 'GET',
					url: 'src/controller/deleteData.php', // Ganti dengan file PHP backend yang sesuai
					data: {
						id: id
					},
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if (data.status === 200) {
							Swal.fire({
								title: "Berhasil!",
								text: response.message,
								icon: "success"
							});

						}

					},
					error: function(data) {

					}
				});
			}

			// console.log('Edit ID: ' + id);
		});




	});
</script>
<!-- <script>
	function cardsCenter() {

		/*  testimonial one function by = owl.carousel.js */



		jQuery('.card-slider').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			//center:true,
			slideSpeed: 3000,
			paginationSpeed: 3000,
			dots: true,
			navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 1
				},
				800: {
					items: 1
				},
				991: {
					items: 1
				},
				1200: {
					items: 1
				},
				1600: {
					items: 1
				}
			}
		})
	}

	jQuery(window).on('load', function() {
		setTimeout(function() {
			cardsCenter();
		}, 1000);
	});
</script> -->


</body>

</html>