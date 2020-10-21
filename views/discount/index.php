<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/4/2020
 * Time: 5:10 PM
 */
?>
<h2>Danh sách mã giảm giá</h2>
<a href="index.php?controller=discount&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table cellpadding="10" cellspacing="20">
    <tr>
        <th>ID</th>
        <th>Mã giảm giá</th>
        <th>% giảm giá</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th></th>
    </tr>
    <?php foreach ($discounts as $discount):?>
    <tr>
        <td><?php echo $discount['id']?></td>
        <td><?php echo $discount['key_word']?></td>
        <td><?php echo $discount['discount_num']?></td>
        <td><?php echo $discount['begin_sale']?></td>
        <td><?php echo $discount['end_sale']?></td>
        <td>
            <?php
            $url_update = "index.php?controller=discount&action=update&id=" . $discount['id'];
            $url_delete = "index.php?controller=discount&action=delete&id=" . $discount['id'];
            ?>&nbsp;
            <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
            <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                    class="fa fa-trash"></i></a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
