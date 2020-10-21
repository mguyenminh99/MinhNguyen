<?php

?>
<h2>Cập nhật tin tức</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        ID: <?php echo $new['id']?>
    </div>
    <div class="form-group">
        Category ID: <?php echo $new['category_id']?>
    </div>
    <div class="form-group">
        <label for="summary">Title</label>
        <input type="text" name="title" value="<?php echo $new['title']?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
        <?php if (!empty($new['avatar'])): ?>
            <img height="80" src="assets/uploads/<?php echo $new['avatar']?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn</label>
        <textarea name="summary" id="summary"
                  class="form-control"><?php echo isset($new['summary']) ? $new['summary'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả chi tiết</label>
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($new['content']) ? $new['content'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Lưu">  <a class="btn btn-secondary" href="index.php?controller=news&action=index">Back</a>
    </div>
</form>
