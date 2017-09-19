<div class='logup'>
    <form action="admin.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <!-- Form Name -->
            <legend>Add article</legend>
            <div class="text-center">

                <!-- Author input -->
                <div class="form-group">
                    <label class="col-md-6 control-label" for="author">Author</label>
                    <div class="col-md-6 mx-auto">
                        <input class="form-control input-md" name="author" type="text" placeholder="Author" size="20" maxlength="20" required>
                    </div>
                    <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_author;?></div>
                </div>

                <!-- Title input -->
                <div class="form-group">
                    <label class="col-md-6 control-label" for="title">Title</label>
                    <div class="col-md-6 mx-auto">
                        <input class="form-control input-md" name="title" type="text" placeholder="Title" size="20" maxlength="20" required>
                    </div>
                    <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_title;?></div>
                </div>

                <!--  Category input-->
                <div class="form-group">
                    <span class="col-md-6 control-label">Category</span>
                    <div class="col-md-6 mx-auto">
                        <span><input class="" name="category_id" type="radio" value="1">IT Techologies</span>
                        <span><input class="" name="category_id" type="radio" value="2">Advetures</span>
                        <span><input class="" name="category_id" type="radio" value="3">Webdesign</span>
                    </div>
                    <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_category_id;?></div>
                </div>

                <!-- Image input -->
                <div class="form-group">
                    <span class="col-md-6 control-label">Image</span>
                    <div class="col-md-6 mx-auto">
                        <input class="form-control input-md" name="file" type="file">
                    </div>
                    <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_title;?></div>
                </div>

                <!-- Preview input -->
                <div class="form-group">
                    <label class="col-md-10 control-label" for="preview">Preview</label>
                    <div class="col-md-10 mx-auto">
                        <textarea name="preview" rows="3" class="form-control form-input-message reset" type="text" placeholder="Text preview" required><?php echo htmlspecialchars($_POST['preview'])?></textarea>
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-md-10 control-label" for="text">Text blog</label>
                    <div class="col-md-10 mx-auto">
                        <textarea name="text" rows="15" class="form-control form-input-message reset" type="text" placeholder="Text blog" required><?php echo htmlspecialchars($_POST['text'])?></textarea>
                    </div>
                </div>

                <!-- Error blog -->
                <h3 style="color: #8a2be2; font-weight: 700; margin-bottom: 10px;"><?php echo $successful_txt;?></h3>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" ></label>
                    <div class="col-md-8 mx-auto">
                        <button class="btn btn-default rounded" name="do_save" type="submit">Save blog</button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>