<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);
    $thankyou_id = $_POST['thankyou_id'];

   

    try {
        $db = new PDO('sqlite:database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("INSERT INTO feedback (name, comment, thankyou_id) VALUES (:name, :comment, :thankyou_id)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':thankyou_id', $thankyou_id);
        $stmt->execute();

    
        

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>