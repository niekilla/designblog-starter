<?php
require '../config.php';

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM articles WHERE article_id = ?");
    $stmt->bind_param("i", $article_id);

    if ($stmt->execute()) {
        echo "<script>alert('Artikel berhasil dihapus!'); window.location.href = 'dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menambahkan artikel: " . $stmt->error . "');</script>";
        exit;
    }
    $stmt->close();
}
?>
