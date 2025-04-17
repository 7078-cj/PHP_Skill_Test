<?php

try {
    $db = new PDO('sqlite:database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $limit = 10; 
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

   
    $countQuery = $db->query("SELECT COUNT(*) FROM ThankYouInstructor");
    $totalMessages = $countQuery->fetchColumn();
    $totalPages = ceil($totalMessages / $limit);

    
    $stmt = $db->prepare("
        SELECT 
            t.id,
            t.title,
            t.registrationdate,
            t.views,
            t.manager,
            t.message,
            t.messageImages,
            i.id AS instructor_id,
            i.instructorName
        FROM 
            ThankYouInstructor t
        JOIN 
            Instructors i ON t.intructor_id = i.id
        ORDER BY t.id ASC
        LIMIT :limit OFFSET :offset
    ");

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
