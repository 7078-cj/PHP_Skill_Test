<?php

try {
    
    $db = new PDO('sqlite:database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $thankYouId = $_GET['id'];

    
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
        WHERE 
            t.id = :id
    ");

    $stmt->bindParam(':id', $thankYouId, PDO::PARAM_INT);
    $stmt->execute();

    
    $thankYouMsg = $stmt->fetch(PDO::FETCH_ASSOC);

    $commentStmt = $db->prepare("
    SELECT 
        id, name, comment
    FROM 
        feedback
    WHERE 
        thankyou_id = :id
    ORDER BY 
        id DESC
    ");
    $commentStmt->bindParam(':id', $thankYouId, PDO::PARAM_INT);
    $commentStmt->execute();

    $comments = $commentStmt->fetchAll(PDO::FETCH_ASSOC);

   
   

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
