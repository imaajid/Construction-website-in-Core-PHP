<?php
include_once("config.php");

?>

<?php
$id = $_GET['id'];
$records = mysqli_query($conn,"SELECT * FROM blog where id = '$id'");

$data = mysqli_fetch_array($records);



if(isset($_POST['submit']))
{
    $del = mysqli_query($conn,"delete from blog_catagory_junction where blog_id = '$id'");



    $id = $_POST['id'];
    $name = $_POST['name'];

    $tittle = $_POST['tittle'];
    $detail = $_POST['detail'];
    $tag = $_POST['tag'];
    $is_live = $_POST['is_live'];
    $edit = mysqli_query($conn," UPDATE blog set id ='$id', name ='$name', tittle='$tittle',detail='$detail', tag='$tag', is_live='$is_live' where id='$id'");


    if($edit)
    {



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





        header("location:list_blog.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }
}

$records = mysqli_query($conn,"SELECT * FROM blog_catagory_junction where blog_id = '$id'");






include("Header.php");
?>





<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">ID</label>
                    <input class="form-control" type="text" name="id" value="<?php echo "$data[id]"?>" id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">message</label>
                    <input class="form-control" type="text" name="name" value="<?php echo "$data[name]"?>" id="example-search-input">
                </div>
                <?php

                $sql2 = 'SELECT * FROM blog_catagory';
                $result = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $flag=false;
                        foreach($records as $Rrow) {

                            if ($row["id"]==$Rrow["blog_category_id"])
                            {
                                $flag=true;

                            }
                        }
                        if($flag==true)
                        {
                            ?>
                            <div class="form-group">
                                <input  type="checkbox" name="cat<?php echo $row["id"]; ?>" checked="checked" value="<?php echo $row["id"]; ?>" id="example-search-input">
                                <label for="example-search-input" class="col-form-label"><?php echo $row["name"]; ?></label>

                            </div>
                            <?php
                        }
                        else
                        {

                            ?>
                            <div class="form-group">
                                <input  type="checkbox" name="cat<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" id="example-search-input">
                                <label for="example-search-input" class="col-form-label"><?php echo $row["name"]; ?></label>
                            </div>
                            <?php
                        }

                    }
                } else {
                    echo "0 results";
                }
                ?>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">NAME</label>
                    <input class="form-control" type="text" name="tittle" value="<?php echo "$data[tittle]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">detail</label>
                    <input class="form-control" type="text" name="detail" value="<?php echo "$data[detail]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">tag</label>
                    <input class="form-control" type="text" name="tag" value="<?php echo "$data[tag]"?>" id="example-search-input">
                </div>
                <b class="text-muted mb-3 d-block">Checkbox:</b>
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="is_live" value="0">
                    <input type="checkbox" name="is_live" value="1" checked="" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label"  for="customCheck1">checked Checkbox</label>
                </div>

                <button class="btn btn-primary" name="submit" type="submit">Edit form</button>
            </form>
        </div>
    </div>
</div>

</div>

<?php include("Footer.php"); ?>




