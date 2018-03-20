<h1>This is genealogy</h1>

<?php foreach($relations as $relation):?>
    <h2><?php echo 'Kay: '. $relation[2].' to';?></h2>
    <h3><?php echo $relation[0]['name_slug'].' '.$relation[1];?></h3>
<?php endforeach;?>