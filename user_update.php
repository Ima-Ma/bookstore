<?php
     include("header.php");
     include("connection.php");
     $id = $_GET["id"];
     $sql = "SELECT * FROM users where id = $id";
     $result = mysqli_query($conn, $sql);
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
                                <h4 class="card-title">update Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>user update</label>
                                                <?php
                                            while($rows = mysqli_fetch_assoc($result)){
                                                ?>
                                                <input type="text" name="name" class="form-control" value="<?php echo $rows ['name'] ?>" placeholder="Update Your Name!">
                                                <?php  } ?>
                                            </div>
                                        </div>
                                        <button type="update" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


                        
<?php
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $sql = "update users set name = '$name' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
   echo"<script> 
   alert('User Has Been Updated Successfully!');
   window.location.href='user_show.php';
   </script>";
}
include("footer.php");

?>