<footer id="footer">
	<div class="footer-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="widget">
						<div class="widget-title">IEDC TKMCE</div>
						<a>About us</a>
						<p align="justify">The Innovation and Entrepreneurship Development Cell of TKMCE is an organisation that aims to promote the institutional vision....</p>
						<a href="<?= base_url() ?>#about" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

					</div>
				</div>
				<div class="col-lg-7">
					<div class="row">
						<div class="col-lg-4">
							<div class="widget">
								<div class="widget-title">Discover</div>
								<ul class="list">
									<li><a href="<?= base_url() ?>#about">About us</a></li>
									<li><a href="<?= base_url() ?>#mission">Mission</a></li>
									<li><a href="<?= base_url() ?>#vision">Vision</a></li>
									<li><a href="<?= base_url() ?>events">Events</a></li>
									<?php if ($this->session->userdata('sess_logged_in') == 0) { ?>
										<li> <a href="<?php echo $loginURL ?>">Login</a></li>
									<?php } else { ?>
										<li> <a href="<?= base_url() ?>user/dashboard">My Profile</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="widget">
								<div class="widget-title">Pages</div>
								<ul class="list">
									<li><a href="<?= base_url() ?>ircell">IR-Cell</a></li>
									<li><a href="<?= base_url() ?>ecell">E-Cell</a></li>
									<li><a href="<?= base_url() ?>communities">Communities</a></li>
									<li><a href="<?= base_url() ?>excom">Excom</a></li>
									<li><a href="<?= base_url() ?>web-team">Web Team</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-content">
		<div class="container">
			<div class="copyright-text text-center">&copy; 2020 IEDC TKMCE</div>
		</div>
	</div>
</footer>

</div>


<a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	var $dropdown1 = $("select[name='position_1']");
	var $dropdown2 = $("select[name='position_2']");

	$dropdown1.change(function() {
		$dropdown2.find('option').prop("disabled", false);
		var selectedItem = $(this).val();
		if (selectedItem) {
			$dropdown2.find('option[value="' + selectedItem + '"]').prop("disabled", true);
		}
	});
	$dropdown2.change(function() {
		$dropdown1.find('option').prop("disabled", false);
		var selectedItem = $(this).val();
		if (selectedItem) {
			$dropdown1.find('option[value="' + selectedItem + '"]').prop("disabled", true);
		}
	});
</script>

<script src="<?= base_url() ?>assets/front/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/front/js/functions.js"></script>

</body>

</html>