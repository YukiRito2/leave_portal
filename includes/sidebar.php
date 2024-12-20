<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <?php if ($session_role == 'Manager'  || $session_role == 'Admin') : ?>
        <div class="pcoded-navigatio-lavel">Navegación</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo ($page_name == 'dashboard') ? 'active' : ''; ?>">
                <a href="index.php">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Aplicaciones</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo ($page_name == 'department') ? 'active' : ''; ?>">
                <a href="department.php">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Departamento</span>
                </a>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'staff' || $page_name == 'new_staff' || $page_name == 'staff_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Personal</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'new_staff') ? 'active' : ''; ?>">
                        <a href="new_staff.php">
                            <span class="pcoded-mtext">Nuevo Personal</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'staff_list') ? 'active' : ''; ?>">
                        <a href="staff_list.php">
                            <span class="pcoded-mtext">Gestionar Personal</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($page_name == 'leave_type') ? 'active' : ''; ?>">
                <a href="leave_type.php">
                    <span class="pcoded-micon"><i class="feather icon-shuffle"></i></span>
                    <span class="pcoded-mtext">Tipo de Permiso</span>
                </a>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'leave' || $page_name == 'apply_leave' || $page_name == 'leave_request' || $page_name == 'my_leave') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-shuffle"></i></span>
                    <span class="pcoded-mtext">Permiso</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'apply_leave') ? 'active' : ''; ?>">
                        <a href="apply_leave.php">
                            <span class="pcoded-mtext">Solicitar Permiso</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'my_leave') ? 'active' : ''; ?>">
                        <a href="my_leave.php">
                            <span class="pcoded-mtext">Mis Permisos</span>
                        </a>
                    </li>
                    <?php if ($session_role == 'Manager' || $session_role == 'Admin') : ?>
                    <li class="<?php echo ($page_name == 'leave_request') ? 'active' : ''; ?>">
                        <a href="leave_request.php?leave_status=0">
                            <span class="pcoded-mtext">Todos los Permisos</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'task' || $page_name == 'new_task' || $page_name == 'task_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Gestor de Proyectos
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'new_task') ? 'active' : ''; ?>">
                        <a href="new_task.php">
                            <span class="pcoded-mtext">Nuevo Proyecto </span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'task_list') ? 'active' : ''; ?>">
                        <a href="task_list.php">
                            <span class="pcoded-mtext">Lista de Proyectos </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'attendance' || $page_name == 'my_attendance') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-clock"></i></span>
                    <span class="pcoded-mtext">Asistencia</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'attendance') ? 'active' : ''; ?>">
                        <a href="attendance.php">
                            <span class="pcoded-mtext">Asistencia</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'my_attendance') ? 'active' : ''; ?>">
                        <a href="my_attendance.php">
                            <span class="pcoded-mtext">Mi Asistencia</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <?php endif; ?>
        <?php if ($session_role == 'Staff') : ?>
        <div class="pcoded-navigatio-lavel">Navegación</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo ($page_name == 'dashboard') ? 'active' : ''; ?>">
                <a href="index.php">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Tablero</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Aplicaciones</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?php echo ($page_name == 'department') ? 'active' : ''; ?>">
                <a href="department.php">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Departamento</span>
                </a>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'staff' || $page_name == 'staff_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Personal</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'staff_list') ? 'active' : ''; ?>">
                        <a href="staff_list.php">
                            <span class="pcoded-mtext">Lista de Personal</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'leave' || $page_name == 'apply_leave' || $page_name == 'my_leave' || $page_name == 'supervisee_leave_request') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-shuffle"></i></span>
                    <span class="pcoded-mtext">Permiso</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="<?php echo ($page_name == 'apply_leave') ? 'active' : ''; ?>">
                        <a href="apply_leave.php">
                            <span class="pcoded-mtext">Solicitar Permiso</span>
                        </a>
                    </li>
                    <li class="<?php echo ($page_name == 'my_leave') ? 'active' : ''; ?>">
                        <a href="my_leave.php">
                            <span class="pcoded-mtext">Mis Permisos</span>
                        </a>
                    </li>
                    <?php if ($session_role == 'Staff' && $session_supervisor == '1') : ?>
                    <li class="<?php echo ($page_name == 'supervisee_leave_request') ? 'active' : ''; ?>">
                        <a href="supervisee_leave_request.php?leave_status=0">
                            <span class="pcoded-mtext">Solicitud de Supervisado</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
            <li
                class="pcoded-hasmenu <?php echo ($page_name == 'task' || $page_name == 'new_task' || $page_name == 'my_task_list') ? 'active pcoded-trigger' : ''; ?>">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Gestor de Proyectos</span>
                </a>
                <ul class="pcoded-submenu">
                    <?php if ($session_role == 'Staff' && $session_supervisor == '1') : ?>
                    <li class="<?php echo ($page_name == 'new_task') ? 'active' : ''; ?>">
                        <a href="new_task.php">
                            <span class="pcoded-mtext">Nueva Tarea</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="<?php echo ($page_name == 'my_task_list') ? 'active' : ''; ?>">
                        <a href="my_task_list.php">
                            <span class="pcoded-mtext">Mis Tareas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($page_name == 'my_attendance') ? 'active' : ''; ?>">
                <a href="my_attendance.php">
                    <span class="pcoded-micon"><i class="feather icon-clock"></i></span>
                    <span class="pcoded-mtext">Mi Asistencia</span>
                </a>
            </li>
        </ul>
        <?php endif; ?>
        <div class="pcoded-navigatio-lavel">Soporte</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="#">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Portafolio</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Soporte </span>
                </a>
            </li>
        </ul>
    </div>
</nav>