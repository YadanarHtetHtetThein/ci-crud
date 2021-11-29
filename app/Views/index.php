<?php foreach($users as $user): ?>
    <p><?php echo $user['name']; ?></p>
    <img src="<?php echo $user['profile_image']; ?>" alt="" width="100px" height="100px">
    <a href="<?php echo base_url('image-delete/'.$user['id']); ?>"><button>delete</button></a>
<?php endforeach; ?>