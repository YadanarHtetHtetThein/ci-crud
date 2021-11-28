<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Image Upload with Form data in CodeIgniter 4 Tutorial</title>
  
</head>
<body>

   <?php
  if(session()->get("success")){
    ?>
      <h3><?= session()->get("success") ?></h3>
    <?php
  }
  if(session()->get("error")){
    ?>
    <h3><?= session()->get("error") ?></h3>
    <?php
  }
?>

<?php 
if(isset($validation)){
    print_r($validation->listErrors());
}
?>

<form action="<?= site_url('my-form') ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>   
<p>
       Name: <input type="text" name="name" placeholder="Enter name"/>
   </p>

   <p>
       Email: <input type="email" name="email" placeholder="Enter email"/>
   </p>

   <p>
       Phone No: <input type="text" name="phone_no" placeholder="Enter phone"/>
   </p>

   <p>
     Profile Image: <input type="file" name="profile_image"/>
   </p>
   <p>
     <button type="submit">Submit</button>
   </p>
</form>

</body>
</html>