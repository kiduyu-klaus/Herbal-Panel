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

            <h2 class="page-title">Add Diet Tips</h2>

            <div class="row">



                <div class="col-md-5 col-sm-5">

                    <div class="panel panel-primary">

                        <div class="panel-heading">

                            ADD NEW TIP

                        </div>

                        <div class="panel-body">

                            <form name="form" method="post" enctype="multipart/form-data">

                                <input type="text" name="name" class="form-control" placeholder="Tip title" required> <br>

                                <input type="text" name="description" class="form-control" placeholder="Tip Description" required><br>

                                <input type="file" name="image" class="form-control"><br>



                                <input type="submit" name="add" value="Add New" class="btn btn-primary">

                            </form>

                            <?php

                            if (isset($_POST['add'])) {

                                $errors = array();
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_tmp = $_FILES['image']['tmp_name'];
                                $file_type = $_FILES['image']['type'];

                                $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

                                $extensions = array("jpeg", "jpg", "png");

                                if (in_array($file_ext, $extensions) === false) {
                                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                                }

                                if ($file_size > 2097152) {
                                    $errors[] = 'File size must be excately 2 MB';
                                }

                                if (empty($errors) == true) {
                                    $u_name = $_POST['name'];
                                    $u_descr  = $_POST['description'];
                                    $dd  = time();
                                    $date =date('l, F d, Y h:i:s a.', $dd);

                                    require_once('include/config.php');
                            
                                    $sql = "INSERT INTO 'herbs_herbs'('title','description','image','date') VALUES ('$u_name','$u_descr','$file_name','$date'";
                                    $data = mysqli_query($mysqli, $sql);
                                    if ($data) {
                                        move_uploaded_file($file_tmp, "img/" . $file_name);
                                        echo "tip added successfully";
                                    } else {
                                        echo "failed" . mysqli_error($mysqli);
                                    }
                                } else {
                                    print_r($errors);
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

    <br>





    <?php

    include('include/footer.php');

    ?>