<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
</head>
<body>
    <h2>Form Pendaftaran</h2>
    <form action="proses.php" method="POST">
        <label for="nama">Nama</label> <br>
        <input type="text" name="nama" required> <br><br>
        <label for="email">Email</label> <br>
        <input type="email" name="email" required> <br><br>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>