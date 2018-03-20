<div class="container">
    <br>
    <h1><?php echo $news['title'];?></h1>
    <hr>
    <img src="<?php echo base_url('assets/img/'.$news['image']);?>" alt="">
    <br>
    <small>Created at: <?php echo $news['created_at'];?></small>
    <br>
    <br>
    <p><?php echo $news['body'];?></p>
</div>
