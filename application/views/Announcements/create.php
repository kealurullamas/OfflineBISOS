<div class="container">
<div class="container-body">
    <h2><?php echo $title; ?></h2>
    <br>
    <?php echo validation_errors(); ?>
    <?php echo form_open('announcements/create');?>
    <div class="form-group">
        <label for="news_title">Announcement Title</label>
        <input type="text" name="title" class="form-control" id="news_title" aria-describedby="emailHelp" placeholder="Enter Annoucement Title">
    </div>
    <div class="form-group">
        <label>Announcement Body</label>
        <textarea name="body" id="editor" class="form-control" placeholder="Enter News Body"></textarea>
    </div>
    <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>