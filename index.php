<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kategori = $_POST['kategori'];
    $pesan = $_POST['pesan'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['dob'];
    $setuju = isset($_POST['setuju']) ? true : false;
    
    if (empty($nama)) {
        $error_message = "Nama harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Email tidak valid.";
    } elseif (empty($kategori)) {
        $error_message = "Kategori harus dipilih.";
    } elseif (empty($pesan)) {
        $error_message = "Pesan harus diisi.";
    } elseif (empty($gender)) {
        $error_message = "Gender harus dipilih.";
    } elseif (empty($date_of_birth)) {
        $error_message = "Tanggal lahir harus dipilih.";
    } elseif (!$setuju) {
        $error_message = "Anda harus setuju dengan syarat dan ketentuan.";
    } else {
        $success_message = "Pendaftaran Beasiswa Berhasil!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugaskelompok3</title>
</head>
<body>
    <h1>Form Pendaftaran Beasiswa</h1>
    <h2>Kelompok 3</h2>
    <h3>S.D.Anggara > Nim.2343033</h3>
    <h3>M. Aldi Ramadan > Nim.2343041</h3>
    <h3>Ahmad Reynaldi > Nim.2343030</h3>
    <form action="" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo isset($nama) ? $nama : ''; ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required><br><br>

        <label for="kategori">Kategori Beasiswa:</label><br>
        <select id="kategori" name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Miskin" <?php echo (isset($kategori) && $kategori == 'Miskin') ? 'selected' : ''; ?>>Miskin</option>
            <option value="Prestasi" <?php echo (isset($kategori) && $kategori == 'Prestasi') ? 'selected' : ''; ?>>Prestasi</option>
            <option value="Kerja sama" <?php echo (isset($kategori) && $kategori == 'Kerja sama') ? 'selected' : ''; ?>>Kerja sama</option>
        </select><br><br>

        <label for="pesan">Pesan:</label><br>
        <textarea id="pesan" name="pesan" rows="4" required><?php echo isset($pesan) ? $pesan : ''; ?></textarea><br><br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="Male" <?php echo (isset($gender) && $gender == 'Male') ? 'checked' : ''; ?>>
        <label for="male">Pria</label><br>
        <input type="radio" id="female" name="gender" value="Female" <?php echo (isset($gender) && $gender == 'Female') ? 'checked' : ''; ?>>
        <label for="female">Wanita</label><br><br>

        <label for="dob">Tanggal Lahir:</label><br>
        <input type="date" id="dob" name="dob" value="<?php echo isset($date_of_birth) ? $date_of_birth : ''; ?>" required><br><br>

        <label for="file">Upload File:</label><br>
        <input type="file" id="file" name="file"><br><br>

        <label for="setuju">
            <input type="checkbox" id="setuju" name="setuju" <?php echo isset($setuju) && $setuju ? 'checked' : ''; ?> required>
            Saya setuju dengan syarat dan ketentuan.
        </label><br><br>

        <input type="submit" value="Cari">
    </form>

    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }

    if (isset($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    }
    ?>
</body>
</html>
