<div class="">
    <!-- Website Overview -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Edit Announcement</h3>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group">
                <label>Announcement Title</label>
                <input type="text" class="form-control" value="<?php echo $row['title'] ?>">
                </div>
                <div class="form-group">
                <label>Announcement Body</label>
                <textarea name="newsbody" class="form-control"><?php echo $row['body']?></textarea>
                </div>
                <input type="submit" class="btn btn-default" value="Update">
            </form>
        </div>
    </div>
</div>
