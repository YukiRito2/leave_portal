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
                    <?php $page_name = "new_task"; ?>
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
                                                        <h4>Assigned Task</h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page body start -->
                                    <div class="card-block">
                                        <h6 class="job-card-desc">Asunto: <?php echo $result['title']; ?></h6>
                                        <p class="text-muted">
                                            <?php
                                            $description = htmlspecialchars_decode($result['description']);
                                            $description = strip_tags($description);
                                            $description = substr($description, 0, 250);
                                            echo $description . (strlen($result['description']) > 250 ? '...' : '');
                                            ?>
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="job-meta-data me-3" style="margin-right: 40px;">
                                                <strong>Fecha de Inicio:</strong>
                                                <label class="label badge-default"
                                                    style="color: black !important;"><?php echo date('d F, Y', strtotime($result['start_date'])); ?></label>
                                            </div>
                                            <div class="job-meta-data">
                                                <strong>Fecha de Vencimiento:</strong>
                                                <label class="label badge-default"
                                                    style="color: black !important;"><?php echo date('d F, Y', strtotime($result['due_date'])); ?></label>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="task-board" style="margin-bottom: 10px;">
                                                <div class="dropdown-secondary dropdown">
                                                    <button id="priority-dropdown"
                                                        class="btn <?php echo $color_btn; ?> btn-mini dropdown-toggle waves-effect waves-light"
                                                        type="button" id="dropdown1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <?php echo $result['priority']; ?>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown1"
                                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <?php if (($result['supervisor_id'] == $sessionEmpId && $result['assigned_to_emp_id'] != $sessionEmpId)): ?>
                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'High' ? 'active' : ''; ?>"
                                                                href="#!" data-priority="High"
                                                                data-task-id="<?php echo $result['id']; ?>"><span
                                                                    class="point-marker bg-warning"></span>Alta
                                                                prioridad</a>
                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'Medium' ? 'active' : ''; ?>"
                                                                href="#!" data-priority="Medium"
                                                                data-task-id="<?php echo $result['id']; ?>"><span
                                                                    class="point-marker bg-success"></span>Media
                                                                prioridad</a>
                                                            <a class="dropdown-priority dropdown-item waves-light waves-effect <?php echo $result['priority'] == 'Low' ? 'active' : ''; ?>"
                                                                href="#!" data-priority="Low"
                                                                data-task-id="<?php echo $result['id']; ?>"><span
                                                                    class="point-marker bg-info"></span>Baja prioridad</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="dropdown-secondary dropdown">
                                                    <button id="status-dropdown"
                                                        class="btn <?php echo $labelClass; ?> btn-mini dropdown-toggle waves-light b-none txt-muted"
                                                        type="button" id="dropdown2" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <?php echo $result['status'] == "Pending" ? 'Pendiente' : ($result['status'] == "In Progress" ? 'En Progreso' : ($result['status'] == "Completed" ? 'Completada' : 'Pendiente')); ?>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown2"
                                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == "Pending" ? 'active' : ''; ?>"
                                                            href="#!" data-status="Pending"
                                                            data-task-id="<?php echo $result['id']; ?>">Pendiente</a>
                                                        <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == "In Progress" ? 'active' : ''; ?>"
                                                            href="#!" data-status="In Progress"
                                                            data-task-id="<?php echo $result['id']; ?>">En Progreso</a>
                                                        <a class="dropdown-status dropdown-item waves-light waves-effect <?php echo $result['status'] == "Completed" ? 'active' : ''; ?>"
                                                            href="#!" data-status="Completed"
                                                            data-task-id="<?php echo $result['id']; ?>">Completada</a>
                                                    </div>
                                                </div>
                                                <!-- end of dropdown-secondary -->
                                                <div class="dropdown-secondary dropdown">
                                                    <button
                                                        class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted"
                                                        type="button" id="dropdown3" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="icofont icofont-navigation-menu"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown3"
                                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-item waves-light waves-effect"
                                                            href="task_details.php?id=<?php echo $result['id']; ?>&edit=1"><i
                                                                class="icofont icofont-spinner-alt-5"></i> Ver Tarea</a>
                                                        <?php if (($result['supervisor_id'] == $sessionEmpId && $result['assigned_to_emp_id'] != $sessionEmpId)): ?>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-light waves-effect"
                                                                href="new_task.php?id=<?php echo $result['id']; ?>&edit=1"><i
                                                                    class="icofont icofont-ui-edit"></i> Editar Tarea</a>
                                                            <a class="remove-ticket dropdown-item waves-light waves-effect"
                                                                href="#!" data-task-id="<?php echo $result['id']; ?>"><i
                                                                    class="icofont icofont-close-line"></i> Eliminar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- end of dropdown menu -->
                                                </div>
                                                <!-- end of seconadary -->
                                            </div>
                                            <!-- end of pull-right class -->
                                        </div>
                                        <!-- end of card-footer -->
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
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
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script>
        function convertDateFormat(dateStr) {
            if (dateStr.includes('/')) {
                var parts = dateStr.split('/');
                return `${parts[2]}-${parts[0].padStart(2, '0')}-${parts[1].padStart(2, '0')}`;
            } else {
                return dateStr;
            }
        }

        $('#tasks-update').click(function(event) {
            event.preventDefault();
            (async () => {
                var startDate = convertDateFormat($('#dropper-animation').val());
                var dueDate = convertDateFormat($('#dropper-default').val());

                console.log("START DATE HERE: " + startDate);
                console.log("DUE DATE HERE: " + dueDate);

                if (!startDate || !dueDate) {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please fill in all required fields.',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                var data = {
                    id: <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>,
                    title: $('#title').val(),
                    description: $('#summernote').summernote('code'),
                    assigned_to: $('#assigned_to').val(),
                    priority: $('input[name="priority"]:checked').val(),
                    start_date: startDate,
                    due_date: dueDate,
                    action: "tasks-update",
                };

                if (data.title === '' || data.description === '' ||
                    data.priority === '' || data.assigned_to === '' || data.start_date === '' ||
                    data.due_date === '' || data.id === 'null') {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please all fieds are required. Kindly fill all',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                console.log('Data HERE: ' + JSON.stringify(data));
                $.ajax({
                    url: '../admin/task_functions.php',
                    type: 'post',
                    data: data,
                    success: function(response) {
                        console.log('success function called');
                        response = JSON.parse(response);
                        console.log('RESPONSE HERE: ' + response.status)
                        console.log(`RESPONSE HERE: ${response.message}`);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                html: response.message,
                                confirmButtonColor: '#01a9ac',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "my_task_list.php";
                                    // location.reload();
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
                        console.log('AJAX Data HERE: ' + JSON.stringify(data));
                        console.log("Response from server: " + jqXHR.responseText);
                        console.log("Status:", status);
                        console.log("Error:", error);
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        Swal.fire({
                            icon: 'error',
                            text: jqXHR.responseText,
                            confirmButtonColor: '#eb3422',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            })()
        })
    </script>
    <script>
        $('#tasks-add').click(function(event) {
            event.preventDefault(); // prevent the default form submission
            (async () => {
                var startDate = convertDateFormat($('#dropper-animation').val());
                var dueDate = convertDateFormat($('#dropper-default').val());

                console.log("START DATE HERE: " + startDate);
                console.log("DUE DATE HERE: " + dueDate);

                if (!startDate || !dueDate) {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please fill in all required fields.',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                var data = {
                    title: $('#title').val(),
                    description: $('#summernote').summernote('code'),
                    assigned_to: $('#assigned_to').val(),
                    priority: $('input[name="priority"]:checked').val(),
                    start_date: startDate,
                    due_date: dueDate,
                    status: "Pending",
                    action: "tasks-add",
                };

                if (data.title === '' || data.description === '' ||
                    data.priority === '' || data.assigned_to === '' || data.start_date === '' ||
                    data.due_date === '') {
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please all fieds are required. Kindly fill all',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                console.log("START DATE HERE: " + $('#dropper-animation').val())
                console.log('Data HERE: ' + JSON.stringify(data));
                $.ajax({
                    url: '../admin/task_functions.php',
                    type: 'post',
                    data: data,
                    success: function(response) {
                        console.log('success function called');
                        response = JSON.parse(response);
                        console.log('RESPONSE HERE: ' + response.status)
                        console.log(`RESPONSE HERE: ${response.message}`);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                html: response.message,
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
                        console.log('AJAX Data HERE: ' + JSON.stringify(data));
                        console.log("Response from server: " + jqXHR.responseText);
                        console.log("Status:", status);
                        console.log("Error:", error);
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        Swal.fire({
                            icon: 'error',
                            text: jqXHR.responseText,
                            confirmButtonColor: '#eb3422',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            })()
        })
    </script>
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                        'subscript', 'clear'
                    ]],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Courier New', 'Georgia', 'Impact', 'Lucida Console',
                    'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana', 'Comic Sans MS',
                    'Palatino Linotype', 'Segoe UI', 'Open Sans', 'Source Sans Pro'
                ],
                fontSizes: ['12', '14', '16', '18', '20', '22', '24', '28', '32'],
                callbacks: {
                    onChangeFont: function(fontName) {
                        // Preserve font size when changing font family
                        var currentFontSize = $(this).summernote('fontSize');
                        $(this).summernote('fontName', fontName);
                        $(this).summernote('fontSize', currentFontSize);
                    }
                },
                onInit: function() {
                    $(this).summernote('fontName', 'Arial');
                    $(this).summernote('fontSize', '16');
                }
            });
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
</body>

</html>