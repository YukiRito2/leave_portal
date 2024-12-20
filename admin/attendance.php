<?php include('../includes/header.php') ?>
<?php
// Check if the user is logged in
if (!isset($_SESSION['slogin']) || !isset($_SESSION['srole'])) {
    header('Location: ../index.php');
    exit();
}

// Check if the user has the role of Manager or Admin
$userRole = $_SESSION['srole'];
if ($userRole !== 'Manager' && $userRole !== 'Admin') {
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
                    <?php $page_name = "attendance"; ?>
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
                                                        <h4>Asistencia</h4>
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
                                                            <div class="col-xl-12">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <!-- contact data table card start -->
                                                                        <?php
                                                                        // Query to fetch attendance records
                                                                        $stmt = mysqli_prepare($conn, "SELECT a.date, a.staff_id, 
                                                                                                            e.first_name, e.middle_name, e.last_name, a.attendance_id,
                                                                                                            a.time_in, a.time_out 
                                                                                                    FROM tblattendance a
                                                                                                    JOIN tblemployees e ON a.staff_id = e.staff_id");
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
                                                                                                <th>ID del Personal</th>
                                                                                                <th>Nombre Completo</th>
                                                                                                <th>Hora de Entrada</th>
                                                                                                <th>Hora de Salida</th>
                                                                                                <th>Horas Totales</th>
                                                                                                <th>Estado
                                                                                                    (Entrada/Salida)
                                                                                                </th>
                                                                                                <th>Acción</th>
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
                                                                                                $status = $row['time_out'] ? 'In/Out' : 'In';

                                                                                                // Split and color the status
                                                                                                if ($status == 'In/Out') {
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
                                                                                                <td><?php echo htmlspecialchars($row['staff_id']); ?>
                                                                                                </td>
                                                                                                <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']); ?>
                                                                                                </td>
                                                                                                <td><?php echo htmlspecialchars(date('h:i A', strtotime($row['time_in']))); ?>
                                                                                                </td>
                                                                                                <td><?php echo $time_out ? htmlspecialchars(date('h:i A', strtotime($row['time_out']))) : '-'; ?>
                                                                                                </td>
                                                                                                <td><strong><?php echo htmlspecialchars($total_hours); ?></strong>
                                                                                                </td>
                                                                                                <td><?php echo $formatted_status; ?>
                                                                                                </td>
                                                                                                <td class="dropdown">
                                                                                                    <button
                                                                                                        id="btn_delete"
                                                                                                        type="submit"
                                                                                                        class="btn btn-primary"
                                                                                                        data-id="<?php echo $row['attendance_id']; ?>"><i
                                                                                                            class="icofont icofont-ui-delete"
                                                                                                            aria-hidden="true"></i>Eliminar</button>
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

        $(function() {
            var interval = setInterval(function() {
                var momentNow = moment();
                $('.date').html(momentNow.format('MMMM DD, YYYY'));
                $('.time').html(momentNow.format('hh:mm:ss A'));
                $('.day').html(momentNow.format('dddd').toUpperCase());
            }, 100);
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#btn_delete').click(function(event) {
                event.preventDefault();
                var attendanceId = $(this).data('id');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¿Realmente quieres eliminar este registro?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ¡elimínalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'attendance_function.php',
                            type: 'POST',
                            data: {
                                action: 'delete_attendance',
                                attendance_id: attendanceId
                            },
                            success: function(response) {
                                response = JSON.parse(response);
                                if (response.status === 'success') {
                                    Swal.fire(
                                        '¡Eliminado!',
                                        'El registro ha sido eliminado.',
                                        'success'
                                    ).then(() => {
                                        location
                                            .reload(); // Refresh the page to reflect changes
                                    });
                                } else {
                                    Swal.fire(
                                        '¡Falló!',
                                        'Falló al eliminar el registro: ' +
                                        response.message,
                                        'error'
                                    );
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('Error:', errorThrown);
                                Swal.fire(
                                    '¡Error!',
                                    'Error al eliminar el registro',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
        </script>

</body>

</html>