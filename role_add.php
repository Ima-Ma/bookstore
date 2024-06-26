<?php
include ("header.php");
include ("connection.php");
?>

<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
          <h4>Hi, welcome back!</h4>
          <span class="ml-1">Element</span>
        </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li> 
        </ol>
      </div>
    </div>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Horizontal Form</h4>
    </div>
    <div class="card-body">
      <div class="basic-form">
        <form method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Role Add</label>
              <input type="text" name="role_name" class="form-control" placeholder="Enter Your Name!">
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
   </div>
     </div>
  </div>
</div>
                  
<?php
    if(isset($_POST['submit'])){
        $role_name=$_POST['role_name'];
        $sql="insert into role(role_name) values('$role_name')";
        $result=mysqli_query($conn,$sql);
        echo"<script>
        alert('Your Role Has Been Inserted!');
        window.location.href='role_show.php';
        </script>";
    }
    include("footer.php");
?>