<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../../src/bootstrap.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $pdo = db();

        $id = $_POST['id_artikel'];
        $judul = $_POST['judul_artikel'];
        $tema = $_POST['tema_artikel'];
        $penulis = $_POST['nama_penulis'];
        $isi = $_POST['isi'];

        if ($_FILES['gambar']['name']) {
            $gambar = $_FILES['gambar']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($gambar);
            if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                throw new Exception('Failed to upload file.');
            }

            $query = "UPDATE artikel SET judul_artikel = :judul, tema_artikel = :tema, nama_penulis = :penulis, isi = :isi, gambar = :gambar WHERE id_artikel = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':gambar', $gambar);
        } else {
            $query = "UPDATE artikel SET judul_artikel = :judul, tema_artikel = :tema, nama_penulis = :penulis, isi = :isi WHERE id_artikel = :id";
            $stmt = $pdo->prepare($query);
        }

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':tema', $tema);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':isi', $isi);
        $stmt->execute();

        echo 'success';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
