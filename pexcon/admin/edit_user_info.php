<?php
include_once("config.php");

?>

<?php
$id = $_GET['id'];
$records = mysqli_query($conn,"SELECT * FROM user_info where id = '$id'");

$data = mysqli_fetch_array($records);



if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    $edit = mysqli_query($conn," UPDATE user_info set id ='$id', message ='$message', name='$name',subject='$subject',email='$email' where id='$id'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list_user_info.php"); // redirects to all records page
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
                    <label for="example-search-input" class="col-form-label">message</label>
                    <input class="form-control" type="text" name="message" value="<?php echo "$data[message]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">NAME</label>
                    <input class="form-control" type="text" name="name" value="<?php echo "$data[name]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">PHONE</label>
                    <input class="form-control" type="text" name="subject" value="<?php echo "$data[subject]"?>" id="example-search-input">
                </div>
                <div class="form-group">
                    <label for="example-search-input" class="col-form-label">MESSAGE</label>
                    <input class="form-control" type="text" name="email" value="<?php echo "$data[email]"?>" id="example-search-input">
                </div>

                <button class="btn btn-primary" name="submit" type="submit">Edit form</button>
            </form>
        </div>
    </div>
</div>

</div>

<?php include("Footer.php"); ?>



