<?php
?>
<h2>Danh sách bản tin</h2>
<a href="index.php?controller=news&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<br>
<br>
<table cellspacing="10" cellpadding="10" border="0">
    <tr>
        <th>ID</th>
        <th>Category_id</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($news)):?>
    <?php foreach ($news as $new):?>
    <tr>
                <td><?php echo $new['id']?></td>
                <td><?php echo $new['category_id']?></td>
                <td><?php echo $new['title']?></td>
                <td>
                    <?php if (!empty($new['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $new['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
                <td><?php echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=news&action=detail&id=" . $new['id'];
                    $url_delete = "index.php?controller=news&action=delete&id=" . $new['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            <?php endforeach;?>
    </tr>
    <?php else:?>
    <?php endif;?>
</table>
