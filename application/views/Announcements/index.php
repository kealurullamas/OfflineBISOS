<div class="container">
<br>
    <h2><?php echo $title?></h2>
    <table class="table table-bordered">
        <thead>
            <tr class="d-flex">
                <th class="col-9">Announcement</th>
                <th class="col-3">Date</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach($announcements as $announcement):?>
                <tr class="d-flex">
                    <td class="col-sm-9"><strong><?php echo $announcement['title'];?></strong><br><br><?php echo $announcement['body'];?></td>
                    <td class="col-sm-3">Posted on: <?php echo $announcement['created_at'];?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>