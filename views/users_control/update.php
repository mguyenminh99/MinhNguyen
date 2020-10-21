<h2>Cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username <span class="red">*</span></label>
        <input type="text" name="username" id="username"
               value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" disabled
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="first_name">First_name</label>
        <input type="text" name="first_name" id="first_name"
               value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="last_name">Last_name</label>
        <input type="text" name="last_name" id="last_name"
               value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone"
               value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $user['phone'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email"
               value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address"
               value="<?php echo isset($_POST['address']) ? $_POST['address'] : $user['address'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control"/>
        <?php if (!empty($user['avatar'])): ?>
            <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="jobs">Jobs</label>
        <input type="text" name="jobs" id="jobs"
               value="<?php echo isset($_POST['jobs']) ? $_POST['jobs'] : $user['jobs'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="text" name="facebook" id="facebook"
               value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : $user['facebook'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="status">Chức vụ</label>
        <select name="role" class="form-control" id="role">
            <?php
            $selected_super_admin = '';
            $selected_admin = '';
            $selected_normal_user = '';
            if (isset($user['role'])) {
                if ($user['role'] == 1 ){
                    $selected_super_admin = 'selected';
                }
                elseif ($user['role'] == 2){
                    $selected_admin = 'selected';
                }
                else{
                    $selected_normal_user = 'selected';
                }
            }
            ?>
            <option value="1" <?php echo $selected_super_admin; ?>>Super Admin</option>
            <option value="2" <?php echo $selected_admin ?>>Admin</option>
            <option value="3" <?php echo $selected_normal_user ?>>Normal User</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=users&action=index" class="btn btn-default">Back</a>
    </div>
</form>