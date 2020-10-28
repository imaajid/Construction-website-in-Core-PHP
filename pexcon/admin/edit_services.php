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
$records = mysqli_query($conn,"SELECT * FROM our_services where id = '$id'");

$data = mysqli_fetch_array($records);



if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $message = $_POST['message'];
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
        $edit = mysqli_query($conn," UPDATE our_services set id ='$id', name ='$name', message='$message',image='$fileName' where id='$id'");


    }
    else{

        $edit = mysqli_query($conn," UPDATE our_services set id ='$id', name ='$name', message='$message' where id='$id'");
    }







    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list_services.php"); // redirects to all records page
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
                    <label for="example-search-input" class="col-form-label">NAME</label>
                    <input class="form-control" type="text" name="name" value="<?php echo "$data[name]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">message</label>
                    <input class="form-control" type="text" name="message" value="<?php echo "$data[message]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">image</label>
                    <input class="form-control" type="file" name="image" id="example-email-input">
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Edit form</button>
            </form>
        </div>
    </div>
</div>

</div>

<?php include("Footer.php"); ?>




