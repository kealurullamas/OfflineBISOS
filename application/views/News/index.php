<!-- <div class="container">
    <h2><?=$title?></h2>
    <?php foreach($News as $news):?>
        <h3><strong><?php echo $news['title']?></strong></h3>
       
        <small>created at: <?php echo $news['created_at']?></small>
        <p style="text-align:justify"><?php echo word_limiter($news['body'],50)?></p>
        <p><a class="btn btn-primary" href="<?php echo site_url('/news/'.$news['slug']);?>">Read More</a></p>
    <?php endforeach?>
</div> -->

<div class="container">
  <h2>News Flash</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table">
    <tbody>
      <?php foreach($News as $news): ?>
        <tr>
            <td><img style="width:100%" src="<?php echo base_url('assets/img/'.$news['image'])?>" alt=""></td>
            <td><h1><?php echo $news['title']?></br></h1><?php echo word_limiter($news['body'],20)?>
            <p><a class="btn btn-primary" href="<?php echo site_url('/news/'.$news['slug'])?>">Read More</a></p></td>
            
        </tr>
      <?php endforeach?>
    </tbody>
  </table>
</div>