
<!------ Include the above in your HEAD tag ---------->
<br><br><br>
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <?php foreach($News as $news):?>
          <?php if($news['id']==1):?>
            <div class="carousel-item active">
              <img class="img-def" src="<?php echo base_url('assets/img/'.$news['image'])?>">
              <div class="carousel-caption">
                <h4><a href="#">Lorem ipsum dolor sit amet consetetur sadipscing</a></h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
              </div>
            </div><!-- End Item -->
          <?php else:?>
          <div class="carousel-item">
            <img class="img-def" src="<?php echo base_url('assets/img/'.$news['image'])?>">
            <div class="carousel-caption">
              <h4><a href="#">Lorem ipsum dolor sit amet consetetur sadipscing</a></h4>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
            </div>
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