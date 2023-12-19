<?php
include('partials/menu.php'); ?>

    <div class="main">
        <div class="wrapper"
        <h1>Add Admin</h1>
        <br/><br/>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <label for="full_name"></label>
                        <input type="text" name="full_name" id="full_name" placeholder="Enter your Name">
                    </td>
                </tr>

                <tr>
                    <td>UserName:</td>
                    <td>
                        <label for="user_name"></label>
                        <input type="text" name="user_name" id="user_name" placeholder="Enter your username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

<?php include('partials/footer.php'); ?>

<?php
//Process the value from Form and Save it in Database
// Check whether the button is clicked or not
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO tbl_admin SET full_name='$full_name',username='$user_name',password ='$password' ";

    $rec = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    if ($rec == TRUE) {
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        header("location:" . SITEURL . '/order/manage-admin.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
        header("location:" . SITEURL . '/order/add-admin.php');  //ページへのリダイレクトをif~else文にて行っている。
    }
}

?>