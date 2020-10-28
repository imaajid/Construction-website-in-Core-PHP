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


    $sql = "INSERT INTO project_detail(image,tittle,description,start_date,end_date,location ) VALUES ('" . $fileName . "','" . $_POST["tittle"] . "','" . $_POST["description"] . "','" . $_POST["start_date"] . "','" . $_POST["end_date"] . "','" . $_POST["location"] . "')";

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
                    <label for="example-search-input" class="col-form-label">image</label>
                    <input class="form-control" type="file" name="image" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-tel-input" class="col-form-label">tittle</label>
                    <input class="form-control" type="text" name="tittle" id="example-tel-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">description</label>
                    <input class="form-control" type="text" name="description" id="example-email-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">start_date</label>
                    <input class="form-control" type="text" name="start_date" id="example-email-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">end_date</label>
                    <input class="form-control" type="text" name="end_date" id="example-email-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">location</label>
                    <input class="form-control" type="text" name="location" id="example-email-input">
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
            </form>
        </div>
    </div>
</div>


</div>
<?php include("Footer.php"); ?>

