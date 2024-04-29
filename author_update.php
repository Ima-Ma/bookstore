<?php
include("header.php");
include("connection.php");
$ID = $_GET["id"];
$sql = "select * from  authors where id = $ID";
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
                                                <label>Author Name</label>
                                                <input type="text" name="authorname" class="form-control" value="<?php echo $rows ['author_name'] ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Date Of Birth</label>
                                                <input type="date" name="dob" class="form-control" value="<?php echo $rows ['DOB'] ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" value="<?php echo $rows ['location'] ?>" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Image</label>
                                                <p><?php echo $rows ['image']?></p>
                                                <input type="file" name="image" class="form-control" >
                                            </div>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update Author</button>
                                    </form>
                                </div>
                </div>
                            
                            </div>
                            </div>


<?php
   if(isset($_POST['update'])){
    $authorname = $_POST['authorname'];
    $date_of_birth = $_POST['dob'];
    $location = $_POST['location'];
    $authorimage = $_FILES['image']['name'];
    $id = $_GET['id'];
    $sql = "update authors set author_name = '$authorname', image = '$authorimage' , location = '$location' , DOB = '$date_of_birth' where id = $id";
    $result = mysqli_query($conn, $sql);
        if(isset($_FILES)){
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
    
            move_uploaded_file($file_tmp , "author/" .$file_name);
    
        }

    echo"<script>
    alert('Your Record Has Been Updated!');
    window.location.href='author_show.php';
     </script>";
}

include("footer.php");
?>