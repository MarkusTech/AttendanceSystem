
<?php
include("controller.php");
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HR | Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="dist/js/1.js"></script>
    <script src="dist/js/2.js"></script>
    <script src="dist/js/3.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">

                </div>
            </form>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                        <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#222d32;">
                            <div class="image">
                                <img src="dist/img/me.jpg" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image">
                            </div>
                        </span>

                        <form method="POST">
                            <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</a>
                        </form>
                    </div>
                </li>

            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">

            <a href="home.php" class="brand-link">
                <img src="dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Employ Attendance</span>
            </a>


            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="home.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="employee_attendance.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Attendance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employees
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="employee_list.php" class="nav-link active">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Employee List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="employee_sched.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Schedules</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="employee_deduction.php" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>
                                    Deduction
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="employee_positions.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Positions
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="print_payroll.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>Payroll</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="print_sched.php" class="nav-link">
                                <i class="nav-icon far fa-clock"></i>
                                <p>Schedules</p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>


        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                    <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> is the sole owner of this script. It is not suitable for personal use. And releasing it in demo version. Besides, it is being provided for free only from <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>. For any of your problems contact us on <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">MH RONY</a> on facebook. Thanks for staying with <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>.</marquee>
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Employee List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Employee List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div align="right">
                                    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> New</button>
                                </div><br>
                                <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Schedule</th>
                                            <th>Member Since</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                        <?php

                $sql = "SELECT * FROM emp_list";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                                        <tr>
                                            <td><?php echo $row['emp_card']; ?></td>
                                            <td><img src="<?php echo $row['emp_photo']; ?>" style="width: 40px;height: 40px;"></td>
                                            <td><?php echo $row['emp_fname']; ?> <?php echo $row['emp_lname']; ?></td>
                                            <td><?php echo $row['emp_position']; ?></td>
                                            <td><?php echo $row['emp_timein']; ?> - <?php echo $row['emp_timeout']; ?></td>
                                            <td><?php echo $row['emp_regdate']; ?></td>
                                            <td>
                                                <button class="btn btn-success btn-flat emp_edit" id="<?php echo $row['emp_id']; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-flat emp_delete" id="<?php echo $row['emp_id']; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                }
                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Employee Tag</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_tag" placeholder="Enter Card Tag" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Firstname</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_name" placeholder="Enter First Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Lastname</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_lastname" placeholder="Enter Last Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_address" placeholder="Enter Address" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Contact Info</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_contact" placeholder="Enter Contact Number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-7">
                                <select name="emp_gender" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer Not">Prefer Not to say</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-7">
                                <select name="emp_position" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <?php
                $sql = "SELECT * FROM emp_position";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                                    <option value="<?php echo $row['pos_id']; ?>"><?php echo $row['position_title']; ?></option>
                                    <?php
                }
                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Schedule</label>
                            <div class="col-sm-7">
                                <select name="emp_schedule" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <?php
                $sql = "SELECT * FROM emp_sched";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                                    <option value="<?php echo $row['sched_id']; ?>"><?php echo $row['sched_in']; ?> - <?php echo $row['sched_out']; ?></option>
                                    <?php
                }
                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-7">
                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

                            </div>
                        </div>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add_employee"><i class="fas fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="emp_edit_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editing...</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="POST">
                    <div class="modal-body" id="emp_edit_details">
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="emp_update"><i class="fas fa-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.emp_edit').click(function() {
            var emp_edit_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    emp_edit_id: emp_edit_id
                },
                success: function(data) {
                    $('#emp_edit_details').html(data);
                    $('#emp_edit_modal').modal("show");
                }
            });
        });
    });
    </script>

    <div id="emp_delete_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="emp_delete_details">
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" name="emp_delete"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.emp_delete').click(function() {
            var emp_del_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    emp_del_id: emp_del_id
                },
                success: function(data) {
                    $('#emp_delete_details').html(data);
                    $('#emp_delete_modal').modal("show");
                }
            });
        });
    });
    </script>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

    <script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    </script>
</body>

</html>
