
<?php include('partials/menu.php'); ?>

<!--Main Section -->
<div class="main">
    <div class="wrapper">
        <h1>Dash Board</h1>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br/><br/>

        <div class="col-4 text-center">
            <?php
            $sql="SELECT * FROM tbl_category";
            $rec=mysqli_query($connect,$sql);
            $count=mysqli_num_rows($rec);
            ?>
            <h1><?php echo $count; ?></h1>
            <br/>
            Categories
        </div>

        <div class="col-4 text-center">
            <?php
            $sql2="SELECT * FROM tbl_food";
            $rec2=mysqli_query($connect,$sql2);
            $count2=mysqli_num_rows($rec2);
            ?>
            <h1><?php echo $count2; ?></h1>
            <br/>
            Foods
        </div>

        <div class="col-4 text-center">
            <?php
            $sql3="SELECT * FROM tbl_order";
            $rec3=mysqli_query($connect,$sql3);
            $count3=mysqli_num_rows($rec3);
            ?>
            <h1><?php echo $count3; ?></h1>
            <br/>
            Orders
        </div>

        <div class="col-4 text-center">
            <?php
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
            $rec4 = mysqli_query($connect, $sql4);
            $row4 = mysqli_fetch_assoc($rec4);
            $total_revenue = $row4['Total'];
            ?>
            <h1>¥<?php  if($total_revenue==0){
                    echo 0;}else{
                    echo $total_revenue;
                }
                ?>
            </h1>
            <br />
            Total Generated
        </div>

        <div class="clearfix"></div>
    </div>

    <?php include('partials/footer.php');  ?>
