<?php
date_default_timezone_set('America/Lima');
include('../includes/config.php');
include('../includes/session.php');

function changePassword($email, $oldPassword, $newPassword)
{
    global $conn;

    if (empty($oldPassword) || empty($newPassword)) {
        $response = array('status' => 'error', 'message' => 'Por favor, complete todos los campos');
        echo json_encode($response);
        exit;
    }

    // Check if the email exists and retrieve the current password hash
    $stmt = mysqli_prepare($conn, "SELECT password FROM tblemployees WHERE email_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        $response = array('status' => 'error', 'message' => 'Correo electrónico no encontrado');
        echo json_encode($response);
        exit;
    } else {
        $row = mysqli_fetch_assoc($result);
        $currentPasswordHash = $row['password'];

        // Verify the old password using MD5
        if (md5($oldPassword) !== $currentPasswordHash) {
            $response = array('status' => 'error', 'message' => 'La contraseña antigua es incorrecta');
            echo json_encode($response);
            exit;
        }

        // Hash the new password using MD5
        $hashedNewPassword = md5($newPassword);

        // Check if the new password is the same as the old password
        if ($hashedNewPassword === $currentPasswordHash) {
            $response = array('status' => 'error', 'message' => 'La nueva contraseña no puede ser la misma que la antigua');
            echo json_encode($response);
            exit;
        }

        // Prepare the query to update the password
        $stmt = mysqli_prepare($conn, "UPDATE tblemployees SET password = ? WHERE email_id = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashedNewPassword, $email);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $response = array('status' => 'success', 'message' => 'Contraseña restablecida con éxito');
            echo json_encode($response);
            exit;
        } else {
            $response = array('status' => 'error', 'message' => 'Error al restablecer la contraseña');
            echo json_encode($response);
            exit;
        }
    }
}

if ($_POST['action'] === 'change_password') {
    if (isset($_SESSION['semail'])) {
        $email = $_SESSION['semail'];
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $response = changePassword($email, $oldPassword, $newPassword);
        echo $response;
    } else {
        $response = array('status' => 'error', 'message' => 'Usuario no ha iniciado sesión');
        echo json_encode($response);
        exit;
    }
}