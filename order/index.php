
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
     <div class="col-4 text-center">
      <h1>5</h1>
      <br/>
      Categories
   </div>
     <div class="col-4 text-center">
         <h1>5</h1>
         <br/>
         Categories
     </div>
     <div class="col-4 text-center">
         <h1>5</h1>
         <br/>
         Categories
     </div>
     <div class="col-4 text-center">
         <h1>5</h1>
         <br/>
         Categories
     </div>
    <div class="clearfix"></div>
 </div>
</div>
 <!--Main Section -->
<?php include('partials/footer.php');  ?>
