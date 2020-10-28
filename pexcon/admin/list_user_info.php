<?php include("Header.php");

include_once("config.php");




?>

<div class="main-content-inner">
    <!-- MAIN CONTENT GOES HERE -->
    <!-- Primary table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List Services</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                        <tr>
                            <th>ID</th>
                            <th>Message</th>
                            <th>Name</th>
                            <th>subject</th>
                            <th>email</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sql = 'SELECT * FROM user_info';
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["subject"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["create_date"]; ?></td>
                                    <td><?php echo $row["update_date"]; ?></td>
                                    <td><nav aria-label="...">
                                            <ul class="pagination pagination-md">


                                                <li class="page-item"><a title="Edit" class="page-link"
                                                                         href="edit_user_info.php?id=<?php echo $row['id']; ?>"><i
                                                            class="fa fa-edit"></i></a></li>
                                                <li class="page-item"><a title="delete" class="page-link"
                                                                         href="delete_user_info.php?id=<?php echo $row['id']; ?>"><i
                                                            class="fa fa-trash"></i></a></li>



                                            </ul>
                                        </nav>
                                    </td>
                                </tr>


                                <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($conn);
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Primary table end -->




</div>


<?php include("Footer.php"); ?>
