<!DOCTYPE html>
<html lang="en">
<header>
<title>My profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</header>
<body>

  <a href="<?=base_url()?>">Home</a><br><br>
<?php foreach ($userinfo as $row) { ?>

Profile : <img src="<?= $profile_pic ?>"><br>
Name : <?=$row['fullname']?><br>
Email :  <?=$row['email']?><br>
Branch : <?=$row['branch']?><br>
Year : <?=$row['course_duration_from']?> - <?=$row['course_duration_to']?><br>
Phone : <?=$row['phone']?><br>
Admission Number : <?=$row['admission_number']?><br>
Hash Code : <?=$row['hashcode']?><br><br>

<?php } ?>

<a href="<?=base_url();?>auth/logout">Logout</a>
</body>
</html>
