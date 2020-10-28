<?php include("Header.php");


?>
<?php
include_once("config.php");

if (isset($_POST["submit"])) {

    $sql = "INSERT INTO blog_catagory(name)VALUES ('" . $_POST["name"] . "')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
}


?>
<div class="main-content-inner">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">

                        <label for="example-search-input" class="col-form-label">NAME</label>

                        <input class="form-control" type="text" name="name" id="example-search-input">
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include("Footer.php"); ?>

