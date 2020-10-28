<?php
include_once("config.php");
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$id = $_GET['id'];
$records = mysqli_query($conn,"SELECT * FROM project_detail where id = '$id'");

$data = mysqli_fetch_array($records);



if(isset($_POST['submit']))
{

    $id = $_POST['id'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $location = $_POST['location'];

    if(isset($_FILES["image"]))
    {

        $targetDir = "upload/";
        $fileName = basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $fileName=generateRandomString();
        $fileName=$fileName.".".$imageFileType;



        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        $edit = mysqli_query($conn," UPDATE project_detail set id ='$id',image='$fileName', tittle ='$tittle', description='$description', start_date='$start_date' , end_date='$end_date', location='$location' where id='$id'");


    }
    else{

        $edit = mysqli_query($conn," UPDATE project_detail set id ='$id', tittle ='$tittle', description='$description', start_date='$start_date', end_date='$end_date', location='$location' where id='$id'");
    }







    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list_project_detail.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }
}
include("Header.php");


?>


<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype='multipart/form-data'>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">ID</label>
                    <input class="form-control" type="text" name="id" value="<?php echo "$data[id]"?>" id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">image</label>
                    <input class="form-control" type="file" name="image" id="example-email-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">tittle</label>
                    <input class="form-control" type="text" name="tittle" value="<?php echo "$data[tittle]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">description</label>
                    <input class="form-control" type="text" name="description" value="<?php echo "$data[description]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">start_date</label>
                    <input class="form-control" type="text" name="start_date" value="<?php echo "$data[start_date]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">end_date</label>
                    <input class="form-control" type="text" name="end_date" value="<?php echo "$data[end_date]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">location</label>
                    <input class="form-control" type="text" name="location" value="<?php echo "$data[location]"?>" id="example-search-input">
                </div>

                <button class="btn btn-primary" name="submit" type="submit">Edit form</button>
            </form>
        </div>
    </div>
</div>

</div>

<?php include("Footer.php"); ?>





