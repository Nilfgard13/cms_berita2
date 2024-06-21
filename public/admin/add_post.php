<?php
require __DIR__ . '/../../src/bootstrap.php';
require_login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']) === 'Male' ? 'pria' : 'wanita';
    $alamat = trim($_POST['alamat']);
    $judul = trim($_POST['judul']);
    $tema = trim($_POST['tema']);
    $isi = trim($_POST['content']);//diubah
    // die($isi);

    $gambar = '';
    if (!empty($_FILES['img']['name'])) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['img']['name']);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            $gambar = basename($_FILES['img']['name']);
        } else {
            echo "Failed to upload image.";
            exit;
        }
    }

    // Get the user ID from the session
    $id_users = $_SESSION['user_id'];

    // Prepare the SQL statement
    $pdo = db(); // Get an instance of PDO
    $sql = "INSERT INTO artikel (id_users, nama_penulis, email, gender, alamat_penulis, judul_artikel, gambar, tema_artikel, isi, jumlah_dikunjungi) 
            VALUES (:id_users, :nama_penulis, :email, :gender, :alamat_penulis, :judul_artikel, :gambar, :tema_artikel, :isi, 0)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_users', $id_users, PDO::PARAM_INT);
        $stmt->bindParam(':nama_penulis', $nama, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':alamat_penulis', $alamat, PDO::PARAM_STR);
        $stmt->bindParam(':judul_artikel', $judul, PDO::PARAM_STR);
        $stmt->bindParam(':gambar', $gambar, PDO::PARAM_STR);
        $stmt->bindParam(':tema_artikel', $tema, PDO::PARAM_STR);
        $stmt->bindParam(':isi', $isi, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Data has been saved successfully.";
            header('Location: addPost.php'); // Redirect to the view post page
            exit;
        } else {
            $error = "Failed to save data. Error: " . $stmt->errorInfo()[2];
            echo "<script>alert('$error');</script>";
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
        echo "<script>alert('$error');</script>";
    }
}
