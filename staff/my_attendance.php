<?php include('../includes/header.php') ?>
<?php
// Check if the user is logged in
if (!isset($_SESSION['slogin']) || !isset($_SESSION['srole'])) {
    header('Location: ../index.php');
    exit();
}

// Check if the user has the role of Manager or Admin
$userRole = $_SESSION['srole'];
if ($userRole !== 'Staff' && $_SESSION['is_supervisor'] !== 1) {
    header('Location: ../index.php');
    exit();
}
?>

<body>
    <!-- Pre-loader start -->
    <?php include('../includes/loader.php') ?>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php include('../includes/topbar.php') ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php $page_name = "my_attendance"; ?>
                    <?php include('../includes/sidebar.php') ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Mi Asistencia</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <!-- tab pane contact start -->
                                                    <div class="tab-pane active" id="contacts" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <!-- user contact card left side start -->
                                                                <div class="card">
                                                                    <div
                                                                        class="tabbed-modal m-b-20 m-t-10 m-r-10 m-l-10">
                                                                        <!-- Nav tabs -->
                                                                        <ul class="nav nav-tabs nav-justified"
                                                                            role="tablist">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active"
                                                                                    data-toggle="tab" href="#clock_in"
                                                                                    role="tab">
                                                                                    <h6>Entrada</h6>
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="tab"
                                                                                    href="#clock_out" role="tab">
                                                                                    <h6>Salida</h6>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        <!-- Tab panes -->
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane active" id="clock_in"
                                                                                role="tabpanel">
                                                                                <div class="auth-box col-xl-12">
                                                                                    <div class="row m-t-20"
                                                                                        style="display: flex; justify-content: center; align-items: center;">
                                                                                        <div class="col-md-9">
                                                                                            <div class="card text-center text-white"
                                                                                                style="background-color: #404E67;">
                                                                                                <div class="card-block">
                                                                                                    <h6
                                                                                                        class="day m-b-0">
                                                                                                    </h6>
                                                                                                    <h4
                                                                                                        class="time m-t-10 m-b-10">
                                                                                                        <i
                                                                                                            class="feather icon-arrow-down m-r-15"></i>
                                                                                                    </h4>
                                                                                                    <p
                                                                                                        class="date m-b-0">
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="ID del Personal"
                                                                                            id="clock_in_id"
                                                                                            name="clock_in_id"
                                                                                            oninput="this.value = this.value.toUpperCase()"
                                                                                            value="<?php echo isset($_SESSION['sstaff_id']) ? $_SESSION['sstaff_id'] : ''; ?>">
                                                                                        <span class="md-line"></span>
                                                                                    </div>
                                                                                    <div class="row m-t-15">
                                                                                        <div class="col-md-12">
                                                                                            <button id="btn_clock_in"
                                                                                                type="submit"
                                                                                                class="btn btn-primary btn-md btn-block waves-effect text-center">CONFIRMAR</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="clock_out"
                                                                                role="tabpanel">
                                                                                <div class="auth-box col-xl-12">
                                                                                    <div class="row m-t-20"
                                                                                        style="display: flex; justify-content: center; align-items: center;">
                                                                                        <div class="col-md-9">
                                                                                            <div class="card text-center text-white"
                                                                                                style="background-color: #404E67;">
                                                                                                <div class="card-block">
                                                                                                    <h6
                                                                                                        class="day m-b-0">
                                                                                                    </h6>
                                                                                                    <h4
                                                                                                        class="time m-t-10 m-b-10">
                                                                                                    </h4>
                                                                                                    <p
                                                                                                        class="date m-b-0">
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="ID del Personal"
                                                                                            id="clock_out_id"
                                                                                            name="clock_out_id"
                                                                                            oninput="this.value = this.value.toUpperCase()"
                                                                                            value="<?php echo isset($_SESSION['sstaff_id']) ? $_SESSION['sstaff_id'] : ''; ?>">
                                                                                        <span class="md-line"></span>
                                                                                    </div>
                                                                                    <div class="row m-t-15">
                                                                                        <div class="col-md-12">
                                                                                            <button id="btn_clock_out"
                                                                                                type="submit"
                                                                                                class="btn btn-primary btn-md btn-block waves-effect text-center">CONFIRMAR</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- user contact card left side end -->
                                                            </div>
                                                            <div class="col-xl-9">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <!-- contact data table card start -->
                                                                        <?php
                                                                        // Query to fetch attendance records
                                                                        $stmt = mysqli_prepare($conn, "SELECT a.date, a.staff_id, 
                                                                        e.first_name, e.middle_name, e.last_name, a.total_hours,
                                                                        a.time_in, a.time_out 
                                                                    FROM tblattendance a
                                                                    JOIN tblemployees e ON a.staff_id = e.staff_id
                                                                    WHERE a.staff_id = ?");
                                                                        mysqli_stmt_bind_param($stmt, "i", $session_sstaff_id);
                                                                        mysqli_stmt_execute($stmt);
                                                                        $result = mysqli_stmt_get_result($stmt);
                                                                        ?>
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h5 class="card-header-text">Registros
                                                                                    de Asistencia</h5>
                                                                            </div>
                                                                            <div class="card-block contact-details">
                                                                                <div
                                                                                    class="data_table_main table-responsive dt-responsive">
                                                                                    <table id="simpletable"
                                                                                        class="table  table-striped table-bordered nowrap">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Fecha</th>
                                                                                                <th>Hora de Entrada</th>
                                                                                                <th>Hora de Salida</th>
                                                                                                <th>Horas Totales</th>
                                                                                                <th>Estado
                                                                                                    (Entrada/Salida)
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                                                            <?php
                                                                                                $time_in = new DateTime($row['time_in']);
                                                                                                $time_out = $row['time_out'] ? new DateTime($row['time_out']) : null;
                                                                                                // Calculate and format total hours
                                                                                                if ($time_out) {
                                                                                                    $time_in = new DateTime($row['time_in']);
                                                                                                    $interval = $time_in->diff($time_out);

                                                                                                    $hours = $interval->h;
                                                                                                    $minutes = $interval->i;
                                                                                                    $seconds = $interval->s;

                                                                                                    $total_hours = '';
                                                                                                    if ($hours > 0) {
                                                                                                        $total_hours .= $hours . ' hr' . ($hours > 1 ? 's ' : ' ');
                                                                                                    }
                                                                                                    if ($minutes > 0) {
                                                                                                        $total_hours .= $minutes . ' min' . ($minutes > 1 ? 's ' : ' ');
                                                                                                    }
                                                                                                    if ($seconds > 0) {
                                                                                                        $total_hours .= $seconds . ' sec' . ($seconds > 1 ? 's' : '');
                                                                                                    }

                                                                                                    $total_hours = trim($total_hours);
                                                                                                } else {
                                                                                                    $total_hours = '-';
                                                                                                }
                                                                                                // Determine status
                                                                                                $status = $row['time_out'] ? 'Entrada/Salida' : 'Entrada';

                                                                                                // Split and color the status
                                                                                                if ($status == 'Entrada/Salida') {
                                                                                                    $formatted_status = '<span style="color: green;">Entrada</span>/<span style="color: orange;">Salida</span>';
                                                                                                } else {
                                                                                                    $formatted_status = '<span style="color: green;">Entrada</span>';
                                                                                                }
                                                                                                ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <?php
                                                                                                        $fecha = date('d M Y', strtotime($row['date'])); // 15 Aug, 2024
                                                                                                        $partesFecha = explode(' ', $fecha); // ["15", "Aug,", "2024"]
                                                                                                        $partesFecha[1] = traducirMesAbreviado($partesFecha[1]); // "Ago,"
                                                                                                        echo implode(' ', $partesFecha); // 15 Ago, 2024
                                                                                                        ?>
                                                                                                </td>
                                                                                                <td><?php echo htmlspecialchars(date('h:i A', strtotime($row['time_in']))); ?>
                                                                                                </td>
                                                                                                <td><?php echo $time_out ? htmlspecialchars(date('h:i A', strtotime($row['time_out']))) : '-'; ?>
                                                                                                </td>
                                                                                                <td><strong><?php echo htmlspecialchars($total_hours); ?></strong>
                                                                                                </td>
                                                                                                <td><?php echo $formatted_status; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <?php endwhile; ?>
                                                                                        </tbody>

                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- contact data table card end -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- tab pane contact end -->
                                                </div>
                                                <!-- tab content end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <!-- Main body end -->
                                <div id="styleSelector">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Required Jquery -->
        <?php include('../includes/scripts.php') ?>
        <?php
        function traducirMesAbreviado($mesAbreviadoIngles)
        {
            $mesesAbreviadosEspañol = array(
                'Jan' => 'Ene',
                'Feb' => 'Feb',
                'Mar' => 'Mar',
                'Apr' => 'Abr',
                'May' => 'May',
                'Jun' => 'Jun',
                'Jul' => 'Jul',
                'Aug' => 'Ago',
                'Sep' => 'Sep',
                'Oct' => 'Oct',
                'Nov' => 'Nov',
                'Dec' => 'Dic'
            );
            return isset($mesesAbreviadosEspañol[$mesAbreviadoIngles]) ? $mesesAbreviadosEspañol[$mesAbreviadoIngles] : $mesAbreviadoIngles;
        } ?>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

        function traducirDiaSemana(diaIngles) {
            const diasSemanaEspañol = {
                'Monday': 'Lunes',
                'Tuesday': 'Martes',
                'Wednesday': 'Miércoles',
                'Thursday': 'Jueves',
                'Friday': 'Viernes',
                'Saturday': 'Sábado',
                'Sunday': 'Domingo'
            };
            return diasSemanaEspañol[diaIngles] || diaIngles;
        }

        function traducirMes(mesIngles) {
            const mesesEspañol = {
                'January': 'Enero',
                'February': 'Febrero',
                'March': 'Marzo',
                'April': 'Abril',
                'May': 'Mayo',
                'June': 'Junio',
                'July': 'Julio',
                'August': 'Agosto',
                'September': 'Septiembre',
                'October': 'Octubre',
                'November': 'Noviembre',
                'December': 'Diciembre'
            };
            return mesesEspañol[mesIngles] || mesIngles;
        }

        $(function() {
            moment.locale('es'); // Configurar Moment.js en español

            var interval = setInterval(function() {
                var momentNow = moment();
                $('.date').html(momentNow.format('MMMM DD, YYYY')); // Mostrará la fecha en español
                $('.time').html(momentNow.format('hh:mm:ss'));
                $('.day').html(momentNow.format('dddd')
                    .toUpperCase()); // Mostrará el día de la semana en español
            }, 100);
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#btn_clock_in').click(function(event) {
                event.preventDefault();
                clockIn();
            });

            $('#btn_clock_out').click(function(event) {
                event.preventDefault();
                clockOut();
            });

            function clockIn() {
                var staffId = $('#clock_in_id').val().trim();
                if (staffId === '') {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please enter your Staff ID to clock in.',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                console.log("STAFF ID HERE: " + staffId);

                $.ajax({
                    url: '../admin/attendance_function.php',
                    type: 'post',
                    data: {
                        action: 'clock_in',
                        staff_id: staffId
                    },
                    success: function(response) {

                        console.log("DUE DATE HERE: " + response);
                        response = JSON.parse(response);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                                confirmButtonColor: '#01a9ac',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                                confirmButtonColor: '#eb3422',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            text: jqXHR.responseText,
                            confirmButtonColor: '#eb3422',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }

            function clockOut() {
                var staffId = $('#clock_out_id').val().trim();
                if (staffId === '') {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please enter your Staff ID to clock out.',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                $.ajax({
                    url: '../admin/attendance_function.php',
                    type: 'post',
                    data: {
                        action: 'clock_out',
                        staff_id: staffId
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                                confirmButtonColor: '#01a9ac',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                                confirmButtonColor: '#eb3422',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            text: jqXHR.responseText,
                            confirmButtonColor: '#eb3422',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
        </script>
</body>

</html>