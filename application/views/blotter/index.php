<div class="container">
<br>
    <h2><?php echo $title?></h2>
    <table class="table table-bordered">
        <thead>
            <tr class="d-flex">
                <th class="col-9">Blotters</th>
                <th class="col-3">Date</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach($blotters as $blotter):?>

            <tr class="d-flex">
                <td class="col-sm-9"><strong><?php echo $blotter['id'];?></strong><br><br><?php echo $blotter['report_body'];?></td>
                <td class="col-sm-3">Created at : <?php echo $blotter['created_at'];?></td>
            </tr>
            <?php endforeach?>
          
        </tbody>
    </table>
</div>