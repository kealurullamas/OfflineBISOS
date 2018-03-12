
<div class="container">
    <h2><?php echo $title; ?></h2>
    <br>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('news/create');?>
    <div class="form-group">
        <label for="news_title">News Title</label>
        <input type="text" name="title" class="form-control" id="news_title" aria-describedby="emailHelp" placeholder="Enter News Title">
    </div>
    <div class="form-group">
        <label>News Body</label>
        <textarea name="body" id="editor" class="form-control" placeholder="Enter News Body"></textarea>
    </div>
    <div class="form-group">
        <label>News Image</label>
        <input type="file" name="img" class="form-control-file" >
     </div>
    <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
</div>