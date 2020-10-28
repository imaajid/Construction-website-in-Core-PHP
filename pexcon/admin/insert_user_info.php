<?php include("Header.php");

include_once("config.php");



if (isset($_POST["submit"])) {

    $sql = "INSERT INTO user_info(message,name,subject,email)VALUES ('" . $_POST["message"] . "','" . $_POST["name"] . "','" . $_POST["subject"] . "','" . $_POST["email"] . "')";

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
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">message</label>
                    <input class="form-control" type="text" name="message" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-tel-input" class="col-form-label">NAME</label>
                    <input class="form-control" type="text" name="name" id="example-tel-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">subject</label>
                    <input class="form-control" type="text" name="subject" id="example-email-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">email</label>
                    <input class="form-control" type="email" name="email" id="example-email-input">
                </div>

                    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>

                </form>
        </div>
    </div>
</div>


</div>
<?php include("Footer.php"); ?>
