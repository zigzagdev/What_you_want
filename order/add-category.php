 <?php include ('partials/menu.php'); ?>

<div class="main">
 <div class="wrapper">
  <h1>Add Category</h1>
     <br/><br/>
 <?php
     if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

     if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
?>
     <br/><br/>
  <form action="" method="post" enctype="multipart/form-data">

   <table class="tbl-30">
    <tr>
     <td>Title</td>
     <td>
       <input type="text" name="title" placeholder="write your category">
     </td>
    </tr>

    <tr>
     <td>Select Image: </td>
     <td>
       <input type="file" name="image">
     </td>
    </tr>

    <tr>
     <td>Featured:</td>
     <td>
      <input type="radio" name="featured" value="Yes"> Yes
      <input type="radio" name="featured" value="No"> No
     </td>
    </tr>

    <tr>
       <td>Active :</td>
       <td>
           <input type="radio" name="active" value="Yes"> Yes
           <input type="radio" name="active" value="No"> No
       </td>
       </tr>
    <tr>
       <td colspan="2">
         <input type="submit" name="submit" value="Add category" class="btn-secondary">
       </td>
    </tr>

   </table>
  </form>
  <?php
    if(isset($_POST['submit']))
     {
       $title=$_POST['title'];
      if(isset($_POST['featured']))
       {
        $featured=$_POST['featured'];
       }
      else
       {
         $featured='No';
       }
      if(isset($_POST['active']))
       {
         $active=$_POST['active'];
       }
      else
       {
         $active='No';
       }

      if(isset($_FILES['image']['name']))
       {

         $image_name= $_FILES['image']['name'];
         $source_path= $_FILES['image']['tmp_name'];
         $destination_path= "../images/category".$image_name;
         $upload=move_uploaded_file($source_path,$destination_path);
           if($upload==false)
           {
               $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
               header('location:'.SITEURL.'/order/add-category.php');
               die();
           }
       }
      else
      {
        $image_name="";
      }
     $sql="INSERT INTO tbl_category SET title='$title',image_name='$image_name',featured='$featured',active='$active'";
     $rec=mysqli_query($connect,$sql);
      if($rec==true)
       {
         $_SESSION['add']="<div class='success'> Category was add correctly</div> ";
         header('location:'.SITEURL.'/order/manage-category.php');
       }
      else
       {
         $_SESSION['add']="<div class='error'> Category was not add</div> ";
         header('location:'.SITEURL.'/order/add-category.php');
       }
     }
  ?>
 </div>
</div>










 <?php include ('partials/footer.php');