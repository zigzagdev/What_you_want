<?php include('partials/menu.php'); ?>

<div class="main2">
    <div class="wrapper">
        <div class="inner">
            <h1>Change PassWord</h1>
            <br/><br/>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            ?>
            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password :</td>
                        <td>
                            <label for="current_password"></label>
                            <input type="password" name="current_password" id="current_password"
                                   placeholder="current password">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password :</td>
                        <td>
                            <label for="new_password"></label>
                            <input type="password" name="new_password" id="new_password" placeholder="new password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password :</td>
                        <td>
                            <label for="confirm_password"></label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                   placeholder="confirm password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" name="submit" value="Change password" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    $rec = mysqli_query($connect, $sql);
    if ($rec == true) {
        $count = mysqli_num_rows($rec);

        if ($count == 1) {
            if ($new_password == $confirm_password) {
                $sql2 = "UPDATE tbl_admin SET password='$new_password'WHERE id=$id ";

                $rec2 = mysqli_query($connect, $sql2);

                if ($rec2 == true) {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                    header('location:' . SITEURL . '/order/manage-admin.php');
                } else {
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";
                    header('location:' . SITEURL . '/order/manage-admin.php');
                }
            } else {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Patch. </div>";
                header('location:' . SITEURL . '/order/manage-admin.php');
            }
        } else {
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
            header('location:' . SITEURL . '/order/manage-admin.php');
        }
    }
}
?>
<?php include('partials/footer.php'); ?>
