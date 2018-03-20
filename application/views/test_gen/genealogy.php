<h1>This is genealogy</h1>

<?php foreach($relations as $relation):?>
    <h3><?php echo $relation[0]['name_slug'].' '.$relation[1];?></h3>
<?php endforeach;?>