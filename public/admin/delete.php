<?php
require __DIR__ . '/../../src/bootstrap.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $pdo = db();

        $id = $_POST['id_artikel'];

        $query = "DELETE FROM artikel WHERE id_artikel = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo 'success';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
