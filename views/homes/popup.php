<?php
?>
<div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="" method="post">
                <div class="modal-header">
                    <h2>Feedback</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="comment">Bình luận</label>
                        <input type="number" value="<?php echo $_GET['ratedIndex']?>" hidden name="star">
                        <textarea name="comment" id="comment" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success" >Đăng bình luận</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myModal').modal('show');
    })
</script>