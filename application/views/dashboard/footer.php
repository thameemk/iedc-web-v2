<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
	<p class="text-muted text-center text-md-left">&copy; <?php echo date("Y"); ?> <a href="https://www.iedctkmce.com/" target="_blank">IEDC TKMCE</a></p>
	<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Made With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i> in India </p>
</footer>

</div>
</div>

<script src="<?= base_url() ?>assets/dashboard/vendors/core/core.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/jquery-steps/jquery.steps.min.js"></script>


<script src="<?= base_url() ?>assets/dashboard/vendors/chartjs/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/jquery.flot/jquery.flot.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/progressbar.js/progressbar.min.js"></script>

<script src="<?= base_url() ?>assets/dashboard/vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/template.js"></script>

<script src="<?= base_url() ?>assets/dashboard/js/dashboard.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/datepicker.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js" integrity="sha512-CrNI25BFwyQ47q3MiZbfATg0ZoG6zuNh2ANn/WjyqvN4ShWfwPeoCOi9pjmX4DoNioMQ5gPcphKKF+oVz3UjRw==" crossorigin="anonymous"></script>

<script>
	$(function() {
		'use strict';
		$("#wizardVertical").steps({
			headerTag: "h2",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			stepsOrientation: 'vertical'
		});
	});
</script>
</body>

</html>