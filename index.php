
<?php 
include("admin/controller.php");
ini_set('display_errors', 0);
ini_set('display_errors', false);
date_default_timezone_set('Asia/Manila');
$time = date("h:i:s");
$today = date("D - F d, Y");
$date = date("Y-m-d");
$in = date("H:i:s");
$out = "12:00:00";

if(isset($_POST['attendance']))
{
$_SESSION['expire'] = date("H:i:s", time() + 1);
$code = $_POST['operation'];
if($code == "time-in")
{
$id = $_POST['emp_id'];
$sql = "SELECT * FROM emp_list WHERE emp_card = '$id'";
$result = mysqli_query($db, $sql);
if(!$row = $result->fetch_assoc()) {
$_SESSION['mess'] = "<div id='time' class='alert alert-danger' role='alert'>
    <i class='fas fa-times'></i> Employee ID is not registered !
</div>";
header("Location: index.php");
}
else {
$sql2 = "SELECT * FROM emp_attendance WHERE employee_id = '$id' AND attendance_date = '$date'";
$result2 = mysqli_query($db, $sql2);
if(!$row2 = $result2->fetch_assoc()) {
$fname = $row['emp_fname'];
$lname = $row['emp_lname'];
$full = $lname . ', ' . $fname;
$card = $row['emp_card'];

$first = new DateTime($in);
$second = new DateTime($out);
$interval = $first->diff($second);
$hrs = $interval->format('%h');
$mins = $interval->format('%i');
$mins = $mins/60;
$int = $hrs + $mins;
if($int > 4){
$int = $int - 1;
}

$sql3 = "INSERT INTO emp_attendance (employee_id, employee_name, attendance_date, attendance_timein, attendance_timeout, attendance_hour)
VALUES ('$id', '$full', '$date', '$in', '$out', '$int')";
$result3 = mysqli_query($db, $sql3);
$_SESSION['mess'] = "<div id='time' class='alert alert-success' role='alert'>
    <i class='fas fa-check'></i> Time in: $full
</div>";
header("Location: index.php");
}
else {
$_SESSION['mess'] = "<div id='time' class='alert alert-warning' role='alert'>
    <i class='fas fa-exclamation'></i> You already have Timed In
</div>";
header("Location: index.php");
}
}
}

if($code == "time-out")
{
$id = $_POST['emp_id'];

$sql = "SELECT * FROM emp_attendance WHERE employee_id = '$id' AND attendance_date = '$date'";
$result = mysqli_query($db, $sql);
if(!$row = $result->fetch_assoc()) {
$_SESSION['mess'] = "<div id='time' class='alert alert-danger' role='alert'>
    <i class='fas fa-times'></i> You did not Timed in !
</div>";
header("Location: index.php");
}
else {
$query = "SELECT * FROM emp_attendance WHERE employee_id = '$id' AND attendance_date = '$date'";
$queryres = mysqli_query($db, $query);
while($rowres = mysqli_fetch_array($queryres))
{
$timein = $row['attendance_timein'];
}
$first = new DateTime($timein);
$second = new DateTime($in);
$interval = $first->diff($second);
$hrs = $interval->format('%h');
$mins = $interval->format('%i');
$mins = $mins/60;
$int = $hrs + $mins;
if($int > 4){
$int = $int - 1;
}
$sql2 = "UPDATE emp_attendance SET attendance_timeout = '$in', attendance_hour = '$int' WHERE employee_id = '$id' AND attendance_date = '$date'";
$result2 = mysqli_query($db, $sql2);
$_SESSION['mess'] = "<div id='time' class='alert alert-success' role='alert'>
    <i class='fas fa-check'></i> Timed Out
</div>";
header("Location: index.php");
}
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Attendance System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="admin/dist/js/1.js"></script>
    <script src="admin/dist/js/2.js"></script>
    <script src="admin/dist/js/3.js"></script>
    <style type="text/css">
    .mt20 {
        margin-top: 20px;
    }

    .result {
        font-size: 20px;
    }

    .bold {
        font-weight: bold;
    }
    </style>
</head>


<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p id="date"><?php echo $today; ?></p>
            <p id="time" class="bold"><?php echo $time; ?></p>
        </div>
        <h1><b>&emsp;&ensp;ATTENDANCE</b></h1>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Enter Employee ID</p>

                <form method="POST">

                    <div class="input-group mb-3">
                        <select name="operation" class="form-control">
                            <option value="time-in">Time In</option>
                            <option value="time-out">Time Out</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="emp_id" class="form-control" placeholder="Employee ID">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="attendance" hidden></button>

                </form>
            </div>

            <?php
    echo $_SESSION['mess'];
    echo $_SESSION['success'];

    $dd = date("H:i:s");

    if($dd == $_SESSION['expire'])
    {
      session_unset();
    }
    ?>

        </div>
    </div>
    <a href="http://192.168.1.8:8080/breaktime/index.php">
        <button style="background-color: limegreen;">Break Time</button>
    </a>
    <br><br>


    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/dist/js/adminlte.min.js"></script>
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="admin/plugins/toastr/toastr.min.js"></script>


    <script type="text/javascript">
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
    }, 100);
    </script>


</body>

</html>
