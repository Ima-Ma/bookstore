<?php
include("header.php");
include("connection.php");
$ID = $_GET["id"];
$sql = "select * from category where id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);

?>

  <!--**********************************
            Content body start
        ***********************************-->
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
                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category Name</label>
                                                <input type="text" value="<?php echo $rows['category_name'] ?>" name="categoryname" class="form-control" placeholder="Enter Your Name!">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Category Image</label>
                                                <h5 class="text-dark"><?php echo $rows['category_image'] ?></h5>
                                                <input type="file" name="image" class="form-control" >
                                            </div>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>


<?php
   if(isset($_POST['update'])){
    $categoryname = $_POST['categoryname'];
    $categoryimage = $_FILES['image']['name'];
    $id = $_GET['id'];
    $sql = "update category set category_name = '$categoryname', category_image = '$categoryimage' where id = $id";
    $result = mysqli_query($conn, $sql);
        if(isset($_FILES)){
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
    
            move_uploaded_file($file_tmp , "images/category/" .$file_name);
    
        }

    echo"<script>
    alert('Your Record Has Been Updated!');
    window.location.href='category_show.php';
     </script>";
}

include("footer.php");
?>