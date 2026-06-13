<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);

    if (empty($nama)) {
            $this->errors['nama'] = "Nama wajib diisi.";
        } elseif (strlen($nama) < 3) {
            $this->errors['nama'] = "Nama harus memiliki minimal 3 karakter.";
        }
    if (empty($email)) {
            $this->errors['email'] = "Email wajib diisi.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Format email tidak valid.";
        }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='tesshrd13@gmail.com';
        $mail->Password='ffuh mbha sjjq wnzj';
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port=587;
        $mail->setFrom('tesshrd13@gmail.com', 'Admin');
        $mail->addAddress($email, $nama);
        $mail->isHTML(true);

        $mail->Subject='Konfirmasi Pendaftaran';
        $mail->Body="
        <h2>Konfirmasi Pendaftaran</h2>
        <p>Halo, $nama.
        Pendaftaran telah berhasil!
        </p>
        ";

        $mail->send();
        echo 'Berhasil dikirim';
    } catch (Exception $e) {
        echo 'Gagal dikirim! Error: {$mail->ErrorInfo}';
    }
}else {
    header("Location: form.php");
    exit();
}
?>