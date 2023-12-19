<?php include('partials/menu.php'); ?>

    <div class="main2">
        <div class="wrapper">
            <div class="inner">
                <h1>Update Admin </h1>
                <br/><br/>

                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";
                $rec = mysqli_query($connect, $sql);

                if ($rec == true) {
                    $count = mysqli_num_rows($rec);
                    if ($count == 1) {
                        $row = mysqli_fetch_assoc($rec);
                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    } else {
                        header('location:' . SITEURL . '/order/update-admin.php');
                    }
                }
                ?>

                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>FullName:</td>
                            <td>
                                <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="text-white">Username:</td>
                            <td>
                                <input type="text" name="username" value="<?php echo $username; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit" value="update Admin" class="btn-secondary">
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
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET full_name = '$full_name',username = '$username' WHERE id='$id' ";

    $rec = mysqli_query($connect, $sql);

    if ($rec == true) {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
        header('location:' . SITEURL . '/order/manage-admin.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
        header('location:' . SITEURL . '/order/manage-admin.php');
    }
}
?>
<?php include('partials/footer.php'); ?>