<h1>Userdata</h1>
<?php var_dump($profileData); ?>
<p>
	ID:  <?php echo $profileData['id']; ?>
</p>
<p>
	Email:  <?php echo $profileData['email']; ?>
</p>
<p>
	Verified Email:  <?php   echo $profileData['verified_email']; ?>
</p>
<p>
	Name:  <?php echo $profileData['name']; ?>
</p>
<p>
	Profile Picture:  <img src="<?php echo $profileData['picture']; ?>" style="width:50px; hight:50px;" />
</p>
<p>
	<!-- <a href="<?php site_url('Auth/logout')?>">Logout</a> -->
  <a href="<?=base_url()?>Auth/logout">Logout</a>

</p>
