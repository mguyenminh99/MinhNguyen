<h2>Danh sách user</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>phone</th>
        <th>address</th>
        <th>email</th>
        <th>avatar</th>
        <th>jobs</th>
        <th>created_at</th>
        <th></th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <?php if (!empty($user['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $user['jobs'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
                <td>
                    <?php
                    $url_update = "index.php?controller=users&action=update&id=" . $user['id'];
                    $url_delete = "index.php?controller=users&action=delete&id=" . $user['id'];
                    ?>&nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>