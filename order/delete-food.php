<?php include('partials/menu.php');

if (isset($_GET['id']) and ($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../images/food/" . $image_name;
        $remove = unlink($path);
        if ($remove == false) {
            $_SESSION['remove'] = "<div class='error'>Error in removing image.</div>";
            header('location:/order/manage-food.php');
            die();
        }
    }
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $rec = mysqli_query($connect, $sql);
    if ($rec == true) {
        $_SESSION['delete'] = "<div class='success'>Delete is done.</div>";
        header('location: ' . SITEURL . '/order/manage-food.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Error in delete .</div>";
        header('location:' . SITEURL . '/order/manage-food.php ');
    }
} else {
    header('location:' . SITEURL . '/order/manage-food.php');
}

?>

