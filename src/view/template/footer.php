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

<script>
	$(document).ready(function() {
		// Menghancurkan DataTable sebelumnya (jika ada)
		$('#example').DataTable().destroy();

		// Menggunakan DataTables untuk menampilkan data dalam tabel
		var dataTable = $('#example').DataTable({
			processing: false,
			serverSide: true,
			ajax: {
				url: 'src/controller/getdata.php', // Nama file PHP backend
				type: 'GET',
				dataType: 'json'
			},
			columns: [{
					data: 'nama',
					orderable: true
				},
				{
					data: 'status',
					orderable: true
				},
				{
					data: 'tanggal',
					orderable: true
				},
				// Tambahkan kolom-kolom lain sesuai dengan struktur tabel
			]
		});

		// Mengatur refresh setiap detik
		setInterval(function() {
			// Reload data dari server tanpa menghancurkan tabel
			dataTable.ajax.reload(null, false); // Parameter kedua false untuk mempertahankan filter
		}, 1000); // Refresh setiap 1 detik


		$
	});
</script>
<script>
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
</script>


</body>

</html>