<?php include("Header.php");

include_once("config.php");



if (isset($_POST["submit"])) {

    $id=rand(100000,999999);
    $sql = "INSERT INTO blog(id,name,tittle,detail,writer_id,tag,is_live)VALUES ('" . $id . "','" . $_POST["name"] . "','" . $_POST["tittle"] . "','" . $_POST["detail"] . "','" . $_POST["user_type"] . "','" . $_POST["tag"] . "','" . $_POST["is_live"] . "')";

    if ($temp=mysqli_query($conn, $sql)) {

                $sql1 = 'SELECT * FROM blog_catagory';
                $result = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        if (isset($_POST['cat'.$row["id"]]))
                        {
                            $sql2 = "INSERT INTO blog_catagory_junction(blog_id,blog_category_id)VALUES ('" . $id . "','" . $row["id"] . "')";
                            mysqli_query($conn, $sql2);
                        }
                    }
                }





    }
    else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
}


?>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">name</label>
                    <input class="form-control" type="text" name="name" id="example-search-input">
                </div>

                <?php

                $sql = 'SELECT * FROM blog_catagory';
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="form-group">
                    <input  type="checkbox" name="cat<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" id="example-search-input">
                    <label for="example-search-input" class="col-form-label"><?php echo $row["name"]; ?></label>

                </div>


                    <?php
                }
                } else {
                    echo "0 results";
                }
                ?>




                <div class="form-group">
                    <label for="example-tel-input" class="col-form-label">tittle</label>
                    <input class="form-control" type="text" name="tittle" id="example-tel-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">detail</label>
                    <input class="form-control" type="text" name="detail" id="example-email-input">
                </div>
                <?php

                $sql = 'SELECT * FROM writter';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0)
                {
                ?>

                <form method="post">
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">writer</label>
                    <select class="custom-select" style="border: 1px solid #e6e6e6;" name="user_type">
                    <option selected="selected">Open this select menu</option>

                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <option value="<?php echo $row["id"];?>"> <?php echo $row["name"];?></option>

                        <?php
                    }

                    }
                    else {
                        echo "0 results";
                    }
                    ?>
                </select>
                    <div class="form-group">
                    <label for="example-email-input" class="col-form-label">tag</label>
                    <input class="form-control" type="text" name="tag" id="example-email-input">
                </div>
                <b class="text-muted mb-3 d-block">Checkbox:</b>
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="is_live" value="0">
                        <input type="checkbox" name="is_live" value="1" checked="" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label"  for="customCheck1">checked Checkbox</label>
                    </div>


                <button class="btn btn-primary" name="submit" type="submit">Submit form</button>

            </form>
        </div>
    </div>
</div>


</div>
<?php include("Footer.php"); ?>
