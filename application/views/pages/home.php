
<!------ Include the above in your HEAD tag ---------->
<div class="row">
  <div class="col-sm-1">.col-sm-3</div>
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

            <h1 class="my-4 text-center text-lg-left">Thumbnail Gallery</h1>

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
<<<<<<< HEAD
        </div>
        <!--end of gallery-->
  </div>
  <div class="col-sm-2">
        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>

        <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>

        <div class="card text-right" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
  </div>
</div>
<br>
=======
          </div><!-- End Item -->
          <?php endif?>
        <?php endforeach?>

      </div><!-- End Carousel Inner -->

    <ul class="list-group col-sm-4">
      <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h6>Lorem ipsum dolor sit amet consetetur sadipscing</h6></li>
      <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h6>Lorem ipsum dolor sit amet consetetur sadipscing</h6></li>
      <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h6>Lorem ipsum dolor sit amet consetetur sadipscing</h6></li>
      <li data-target="#myCarousel" data-slide-to="3" class="list-group-item"><h6>Lorem ipsum dolor sit amet consetetur sadipscing</h6></li>
      <li data-target="#myCarousel" data-slide-to="4" class="list-group-item"><h6>Lorem ipsum dolor sit amet consetetur sadipscing</h6></li>
      <li data-target="#myCarousel" data-slide-to="4" class="list-group-item"><h6>Lorem ipsum dolor sit amet consetetur sadipscing</h6></li>
    </ul>

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
</div>
>>>>>>> a843a9f9039ef06629810c7aad5efeb646736059
