<?php
include('include/header.php');
include('include/config.php');
include('include/checklogin.php');
check_login();

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2 class="page-title">Add Consultant</h2>
            <div class="row">

                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW CONSULTANT
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post">
                                <input type="text" name="name" class="form-control" placeholder="Consultant Name"> <br>
                                <input type="text" name="phone" class="form-control" placeholder="Consultant Phone Number"><br>
                                <input type="text" name="idnumber" class="form-control" placeholder="Consultant Id Number"><br>
                                <input type="text" name="location" class="form-control" placeholder="Consultant Location"><br>
                                <input type="file" name="image" class="form-control"><br>
                                
                                <input type="submit" name="add" value="Add New" class="btn btn-primary">
                            </form>
                            <?php
                            if (isset($_POST['add'])) {
                                $room = $_POST['troom'];
                                $bed = $_POST['bed'];
                                $place = 'Free';

                                $check = "SELECT * FROM room WHERE type = '$room' AND bedding = '$bed'";
                                $rs = mysqli_query($con, $check);
                                $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                                if ($data[0] > 1) {
                                    echo "<script type='text/javascript'> alert('Room Already in Exists')</script>";
                                } else {


                                    $sql = "INSERT INTO `room`( `type`, `bedding`,`place`) VALUES ('$room','$bed','$place')";
                                    if (mysqli_query($con, $sql)) {
                                        echo '<script>alert("New Room Added") </script>';
                                    } else {
                                        echo '<script>alert("Sorry ! Check The System") </script>';
                                    }
                                }
                            }

                            ?>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-1"></div>
        </div>

    </div>



    <?php
    include('include/footer.php');
    ?>