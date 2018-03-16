
<!------ Include the above in your HEAD tag ---------->
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-8">
  <br>
    <div class="container">
    
    <h2>Barangay News Headlines</h2>
    <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        
            <?php foreach($News as $news):?>
            <?php if($news['id']==$News[0]['id']):?>
                <div class="carousel-item active">
                <img style="width:100%; height:480px" src="<?php echo base_url('assets/img/'.$news['image'])?>">
                <div class="carousel-caption">
                    <h4><a href="#"><?php echo $news['title']?></a></h4>
                    <p><?php echo word_limiter($news['body'],25);?><a class="label label-primary" href="<?php echo site_url('/news/'.$news['slug'])?>" >Read More</a></p>
                </div>
                </div><!-- End Item -->
            <?php else:?>
            <div class="carousel-item">
                <img style="width:100%;  height:480px" src="<?php echo base_url('assets/img/'.$news['image'])?>">
                <div class="carousel-caption">
                <h4><a href="#"><?php echo $news['title']?></a></h4>
                <p><?php echo word_limiter($news['body'],25);?><a class="label label-primary" href="<?php echo site_url('/news/'.$news['slug'])?>" >Read More</a></p>
                </div>
            </div><!-- End Item -->
            <?php endif?>
            <?php endforeach?>
            
                    
        </div><!-- End Carousel Inner -->


        <ul class="list-group col-sm-4">
        <?php if(!empty($News[0])):?>
            <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h6><?php echo $News[0]['title'];?></h6></li>
            <?php endif?>
        <?php if(!empty($News[1])):?>
            <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h6><?php echo $News[1]['title'];?></h6></li>
            <?php endif?>
        <?php if(!empty($News[2])):?>
            <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h6><?php echo $News[2]['title'];?></h6></li>
            <?php endif?>
        <?php if(!empty($News[3])):?>
            <li data-target="#myCarousel" data-slide-to="3" class="list-group-item"><h6><?php echo $News[3]['title'];?></h6></li>
            <?php endif?>
        <?php if(!empty($News[4])):?>
            <li data-target="#myCarousel" data-slide-to="4" class="list-group-item"><h6><?php echo $News[4]['title'];?></h6></li>
            <?php endif?>
        <?php if(!empty($News[4])):?>
            <li data-target="#myCarousel" data-slide-to="5" class="list-group-item"><h6><?php echo $News[5]['title'];?></h6></li>
        <?php endif?>
        

        <!-- Controls -->
        <div class="carousel-controls">
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

        </div><!-- End Carousel -->
        <hr>

        <!-- Start Gallery -->
         <div class="container">

            <h1 class="my-4 text-center text-lg-left">Barangay Gallery</h1>

            <div class="row text-center text-lg-left">

                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
                </div>
                </div>
            </div>
        </div>
        <!--end of gallery-->
  </div>
  <div class="col-6 col-md-1 sidebar-offcanvas" id="sidebar">
  <br>
        <div class="card" style="width: 22rem;">
        <div class="card-body">
        <h5>Announcements</h5>
            <div class="list-group">
                <?php foreach($Announcements as $announcement):?>
                <a href="<?php echo base_url().'announcements/view/'.$announcement['slug'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><strong><?php echo $announcement['title'];?></strong></h5>
                    </div>
                    <small><?php echo $announcement['created_at'];?></small>
                    <p class="mb-1"><?php echo word_limiter($announcement['body'],20);?></p>
                    <small>Read More</small>
                </a>
               
                <?php endforeach;?>
            </div>
            <br>
            <a href="#" class="btn btn-primary">More</a>
        </div>
        </div>

  </div>
</div>
<br>
