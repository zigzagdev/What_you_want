<?php include ('partials/menu.php'); ?>

<div class="main">
 <div class="wrapper">
   <h1>Add Food</h1>
    <br/><br/>


  <form action="" method="post" enctype="multipart/form-data">
   <table class="tbl-30">

     <tr>
      <td>Title:</td>
      <td>
        <input type="text" name="title" placeholder="write title food">
      </td>
     </tr>

     <tr>
      <td>Description:</td>
      <td>
       <textarea name="description" cols="30" rows="5" placeholder="Description its feature."></textarea>
      </td>
     </tr>

    <tr>
     <td>Price:</td>
     <td>
      <input type="number" name="price">
     </td>
    </tr>


   </table>

  </form>

 </div>
</div>

<?php include ('partials/footer.php') ?>