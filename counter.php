<?php

require 'config.php';
// Ambil ID artikel dari URL
$article_id = $_GET['id'];

// Query untuk menampilkan artikel
$query = "SELECT * FROM articles WHERE article_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

// Perbarui view_count
$updateQuery = "UPDATE articles SET view_count = view_count + 1 WHERE article_id = ?";
$updateStmt = $conn->prepare($updateQuery);
$updateStmt->bind_param("i", $article_id);
$updateStmt->execute();
?>
