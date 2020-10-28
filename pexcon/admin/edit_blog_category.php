<?php
include_once("config.php");

?>

<?php
$id = $_GET['id'];
$records = mysqli_query($conn,"SELECT * FROM blog_catagory where id = '$id'");

$data = mysqli_fetch_array($records);



if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];

    $edit = mysqli_query($conn," UPDATE blog_catagory set id ='$id', name ='$name' where id='$id'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list_blog_category.php"); // redirects to all records page
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
            <form action="" method="post">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">ID</label>
                    <input class="form-control" type="text" name="id" value="<?php echo "$data[id]"?>" id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">NAME</label>
                    <input class="form-control" type="text" name="name" value="<?php echo "$data[name]"?>" id="example-search-input">
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Edit form</button>
            </form>
        </div>
    </div>
</div>

</div>

<?php include("Footer.php"); ?>


