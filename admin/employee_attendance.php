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
                                <img src="dist/img/favicon.ico" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image">
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
                <span class="brand-text font-weight-light">Banquerigo Attendance</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="home.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="employee_attendance.php" class="nav-link active">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Attendance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employees
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="employee_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
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
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Attendance</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Attendance</li>
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
                                <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                $sql = "SELECT * FROM emp_attendance, emp_list, emp_sched WHERE emp_attendance.employee_id = emp_list.emp_card AND emp_list.sched_id = emp_sched.sched_id";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                  if($row['attendance_timein'] <= $row['sched_in']) {
                ?>
                                        <tr>
                                            <td><?php echo $row['attendance_date']; ?></td>
                                            <td><?php echo $row['employee_id']; ?></td>
                                            <td><?php echo $row['employee_name']; ?></td>
                                            <td><?php echo $row['attendance_timein']; ?> <span class="float-right badge bg-success">On Time</span></td>
                                            <td><?php echo $row['attendance_timeout']; ?></td>
                                        </tr>
                                        <?php
                  }
                  else {
                ?>
                                        <tr>
                                            <td><?php echo $row['attendance_date']; ?></td>
                                            <td><?php echo $row['employee_id']; ?></td>
                                            <td><?php echo $row['employee_name']; ?></td>
                                            <td><?php echo $row['attendance_timein']; ?> <span class="float-right badge bg-warning">Late</span></td>
                                            <td><?php echo $row['attendance_timeout']; ?></td>
                                        </tr>
                                        <?php
                  }
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