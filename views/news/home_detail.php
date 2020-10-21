<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/10/2020
 * Time: 4:39 AM
 */
?>
<div class="container">
    <h2><?php echo $new['title']?></h2>
    <img class="img-fluid" src="assets/uploads/<?php echo $new['avatar']?>" alt="Image" />
    <br>
    <br>
    <h4><?php echo $new['summary']?></h4>
    <br>
    <p><?php echo $new['content']?></p>
    <br>
    <a href="index.php?controller=home&action=index" class="btn btn-primary">Back</a>
</div>
