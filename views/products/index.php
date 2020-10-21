<?php
require_once 'helpers/Helper.php';
?>
<!--
xây dựng 1 form tìm kiếm sản phẩm dựa vào các thôgn tin sau: tên sp, giá sp, tên danh mục
- khi sử dụng phương thức GET cho form: với mô hỉnh mvc hiện tại sẽ bị mất tham số controller và action do các tính chất
của phương thức GET là chỉ lấy các thuộc tính name hiện tại của form, để giữ lại các tham số controller và action:
thì sẽ khai báo thêm 2 phương thức trong form ở dạng hidden
-->
<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
?>
<form action="" method="get">
    <input type="hidden" name="controller" value="<?php echo $_GET['controller']?>">
    <input type="hidden" name="action" value="<?php echo $_GET['action']?>">
    <div class="row form-group">
        <div class="col-md-4">
            <label for="category_id">Chọn Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="-1">--Chọn danh mục--</option>
                <?php foreach ($categories as $category):?>
                    <option value="<?php echo $category['id'];?>"><?php echo $category['name']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="name">Nhập tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="price">Nhập giá</label>
            <input type="number" name="price" id="price" class="form-control">
        </div>
    </div>
    <div class="form-group">
<!--        <input type="submit" name="search" value="Tìm kiếm">-->
        <button type="submit" name="search" class="btn btn-primary" ><i class="fa fa-search"></i> Tìm kiếm</button>
    </div>
</form>


<h2>Danh sách sản phẩm</h2>
    <a href="index.php?controller=product&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category name</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['category_name'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td>
                    <?php if (!empty($product['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo number_format($product['price']) ?></td>
                <td><?php echo $product['sale'] . "%";?></td>
                <td><?php echo $product['amount'] ?></td>
                <td><?php echo Helper::getStatusText($product['status']) ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
                <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                    $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                    $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>