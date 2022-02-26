<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Event Participant</li>
		</ol>
	</nav>
	<?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<?php if ($this->session->flashdata('fail')) : ?>
						<span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
					<?php endif; ?>
					<?php if ($this->session->flashdata('success')) : ?>
						<span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
					<?php endif; ?>
					<div class="card-body">
						<h6 class="card-title">ADD EVENT PARTICIPANT</h6>
						<h6 class="my-1">Event Name : <?php echo($eventDetails->event_title) ?></h6>
						<?php echo form_open_multipart('admin/add_stories'); ?>
						<div class="forms-sample">
                        <div class="form-group">
                                <label for="payment_id">Enter payment id (If you are a 'ELGIBLE' user for 'FREE' registration please type 'NA' )</label>
                                <input type="text" class="form-control" name="payment_id" id="payment_id" placeholder="Payment ID" required>
                            </div>
                            <p style="color: blue;"><b>Please fill your teammates email id (if any)</b></p>
                            <input type="email" class="form-control mb-1" value="<?= $_SESSION['email'] ?>" readonly>
                            <span id="addMember">
                            </span>
						
                            <button type='button' onclick="addMember()" class='btn btn-primary'>Add Member</button>
							<button type="submit" class="btn btn-primary mr-2">Submit</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php } else { ?>
		<h5 style="color:red">You are not authorized to access this page</h5>
	<?php } ?>
</div>

<script>
    function addMember() {
        $("#addMember").append('<span class="removeClass" style="display:inline-flex;width:100%;"><input type="email" name="team_email[]" placeholder="Enter email id" class="form-control mb-1"> <button type="button" onclick="removeInputField(this);" class="btn btn-danger"><i class="fa fa-times"></i></button></span>');
    }

    function removeInputField(selectedField) {
        selectedField.closest('.removeClass').remove();
    }
</script>