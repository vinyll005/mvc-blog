<?php include_once(ROOT.'/views/layouts/header.php'); ?>

<form action="#" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="row row-space">
        <div class="col-10">
            <div class="input-group">
                <label class="label">Article title</label>
                <input class="input--style-4" type="title" name="title" required>
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-10">
            <div class="input-group">
                <label class="label">Author</label>
                <input class="input--style-4" type="author" name="author" required>
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-10">
            <div class="input-group">
                <label class="label">Article text</label>
            </div>
            <textarea class="input--style-4" type="textarea" name="text" rows="12" cols="50" required></textarea>
        </div>
    </div>
    <div class="row row-space">
    <div class="col-10">
        <label class="label">Category</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" value="category" name="category" required>
        <option value="food" selected>Food</option>
        <option value="lifestyle">Lifestyle</option>
        <option value="others">Others</option>
      </select>
    </div>
    </div>

    <div class="p-t-20">
        <input type="file" name="image" placeholder="" value="">
    </div>

    <div style="padding-top:100px; padding-bottom:50px;">
        <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Add article</button>
    </div>
    </div>
    <input type="hidden" name="status" value="1">
</form>

<?php include_once(ROOT.'/views/layouts/footer.php'); ?>