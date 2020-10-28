<?php include("Header.php");

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

//image uploading in php
if (isset($_POST["submit"])) {
    $targetDir = "upload/";
    $fileName = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $fileName=generateRandomString();
    $fileName=$fileName.".".$imageFileType;
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
    $sql = "INSERT INTO writter(name,detail,image)VALUES ('" . $_POST["name"] . "','" . $_POST["detail"] . "','" . $fileName ."')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
}
?>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" action="" enctype='multipart/form-data'>

                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">NAME</label>
                    <input class="form-control" type="text" name="name" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-tel-input" class="col-form-label">detail</label>
                    <input class="form-control" type="text" name="detail" id="example-tel-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="example-email-input">
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
            </form>
        </div>
    </div>
</div>


</div>
<?php include("Footer.php"); ?>


