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
<form action="<?= site_url('my-form') ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>   
<p>
       Name: <input type="text" name="name" placeholder="Enter name" value="<?= set_value('name') ?>"/>
      <?php
      if(isset($validation)){
        if ($validation->hasError('name')){
          echo $validation->getError('name');
        }
      }
      ?>
   </p>

   <p>
       Email: <input type="type" name="email" placeholder="Enter email" value="<?= set_value('email') ?>"/>
       <?php
      if(isset($validation)){
        if ($validation->hasError('email')){
          echo $validation->getError('email');
        }
      }
      ?>
   </p>

   <p>
       Phone No: <input type="text" name="phone_no" placeholder="Enter phone" value="<?= set_value('phone_no') ?>"/>
       <?php
      if(isset($validation)){
        if ($validation->hasError('phone_no')){
          echo $validation->getError('phone_no');
        }
      }
      ?>
   </p>

   <p>
     Gender: 
     <select name="gender" id="gender">
       <option <?= set_select('gender','') ?> value="">Choose option ... </option>
       <option <?= set_select('gender','male') ?>  value="male">Male</option>
       <option <?= set_select('gender','female') ?>  value="female">Female</option>
       <option <?= set_select('gender','other') ?>  value="other">Other</option>
     </select>
      <?php
      if(isset($validation)){
        if ($validation->hasError('gender')){
          echo $validation->getError('gender');
        }
      }
      ?>
   </p>

   <p>
     Profile Image: <input type="file" name="profile_image"/>
     <?php
      if(isset($validation)){
        if ($validation->hasError('profile_image')){
          echo $validation->getError('profile_image');
        }
      }
      ?>
   </p>
   <p>
     <button type="submit">Submit</button>
   </p>
</form>

</body>
</html>