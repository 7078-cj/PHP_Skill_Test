<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    <?php
        include "component/header.php"
    ?>
    <?php 
        include "database/messageDB.php"
    ?>
    <div class="thankyou-box">

    
    <table class="thankyou-table">
    <tr>
        <th>title</th>
        <td><?= htmlspecialchars( $thankYouMsg['title']) ?></td>
        <th>name</th>
        <td><?= htmlspecialchars( $thankYouMsg['manager']) ?></td>
    </tr>
    <tr>
        <th>Registration date</th>
        <td><?= htmlspecialchars( $thankYouMsg['registrationdate']) ?></td>
        <th>Hits</th>
        <td><?= htmlspecialchars( $thankYouMsg['views']) ?></td>
    </tr>
    </table>

   
    <div class="thankyou-image">
    <img src="<?= htmlspecialchars( $thankYouMsg['messageImages']) ?>" alt="Teacher Photo 1">
    </div>

   
    <span>
    <?= nl2br(htmlspecialchars($thankYouMsg['Message'])) ?>
    </span>
    

    <div class="comment-box">
    <form method="POST" action="database/commentDB.php">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="name" required />
            </div>
            <div class="col-md-6 captcha-box">
                <input type="text" name="captcha" placeholder="captcha" />
                <div class="bg-dark text-white px-2 py-1">7572</div>
                <a href="#" class="text-decoration-none">Refresh</a>
            </div>
            <div>
            <input type="hidden" name="thankyou_id" value="<?= htmlspecialchars($_GET['id']) ?>">
            </div>
        </div>
        <textarea name="comment" rows="4" placeholder="comment" required></textarea>
        <div class="text-center">
            <button type="submit" class="register-btn">Register</button>
        </div>
    </form>
    </div>

    <?php foreach ($comments as $c): ?>
        <div class="reply-box mt-4">
        <strong><?= htmlspecialchars($c['name']) ?></strong><br>
        <?= nl2br(htmlspecialchars($c['comment'])) ?>
        </div>
    <?php endforeach; ?>

    </div>
    <?php
        include "component/footer.php"
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>