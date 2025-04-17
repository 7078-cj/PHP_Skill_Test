
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poweringlish - English Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    
   <?php
    include "component/header.php";
   ?>

    <section class="ThankYou-section">
        <div class="container thank-you-list">
            <div class="list-title">List</div>
            <?php
                include "database/messagesDB.php";
                $half = ceil(count($messages) / 2);
            ?>

            <div class="row">
                
                <div class="col-md-6">
                    <?php foreach (array_slice($messages, 0, $half) as $msg) { ?>
                        <a href="thankYouMsg.php?id=<?= $msg["id"] ?>" class="text-decoration-none text-black">
                            <div class="thankyouCard py-4">
                                <div class="thank-you-item">
                                    <img src="<?= htmlspecialchars($msg['messageImages']) ?>" alt="Teacher Image">
                                    <div class="thank-you-text py-4">
                                        <h6><?= htmlspecialchars($msg['title']) ?></h6>
                                        <p>
                                            Managed: <?= htmlspecialchars($msg['manager']) ?> |
                                            Registration Date: <?= htmlspecialchars($msg['registrationdate']) ?> |
                                            Views: <?= htmlspecialchars($msg['views']) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>

                
                <div class="col-md-6">
                    <?php foreach (array_slice($messages, $half) as $msg) { ?>
                        <a href="thankYouMsg.php?id=<?= $msg["id"] ?>" class="text-decoration-none text-black">
                            <div class="thankyouCard py-4">
                                <div class="thank-you-item">
                                    <img src="<?= htmlspecialchars($msg['messageImages']) ?>" alt="Teacher Image">
                                    <div class="thank-you-text py-4">
                                        <h6><?= htmlspecialchars($msg['title']) ?></h6>
                                        <p>
                                            Managed: <?= htmlspecialchars($msg['manager']) ?> |
                                            Registration Date: <?= htmlspecialchars($msg['registrationdate']) ?> |
                                            Views: <?= htmlspecialchars($msg['views']) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>

                </div>
                    </div>
        
           
                <?php
            
            if ($totalPages > 1) {
                echo '<nav aria-label="Page navigation">';
                echo '<ul class="pagination justify-content-center">';

                for ($i = 1; $i <= $totalPages; $i++) {
                    $active = ($i == $page) ? 'active' : '';
                    echo "<li class='page-item $active'>
                            <a class='page-link' href='?page=$i'>$i</a>
                        </li>";
                }

                echo '</ul>';
                echo '</nav>';
            }
        ?>

    </section>

    <section class="howTosend-section">
        
            <h1>How to send</h1>
            <span class="md">You can send it directly from your members as a Power English Philippine training center.</span>
        
        <div class="Step">
            <div>
                <img src="assets/Step1.png">
                <h4>Step 1</h4>
                <span>Take a parcel (gift)
                        Visit post office
                        (Or use of pickup service)
                    </span>
            </div>
            <div>
                <img src="assets/Step2.png">
                <h4>Step 2</h4>
                <span>According to the employee's instructions
                Buy a box to hold things
                    </span>
            </div>
            <div>
                <img src="assets/Step3.png">
                <h4>Step 3</h4>
                <span>According to the employee's instructions
                Buy a box to hold things
                    </span>
            </div>
            <div>
                <img src="assets/Step4.png">
                <h4>Step 4</h4>
                <span>According to the employee's instructions
                Buy a box to hold things
                    </span>
            </div>
            
        </div>
        
            <h6>Philippine Education Center Address</h6>
            <span>
                <b>Teacher's name:</b><span>(ex)Ally</span>  <b>Tel No:</b><span>+63 74 661 3624</span>
            </span>
            <div>JerrieMarie, 2nd Floor the Zone Vill condominium Bldg. C, #4 Bukaneg St. Legarda Rd, Baguio City, 2600 Phillppines</div>
        
    </section>

    <section class="bottom-section">
                <img src="assets\bg-header-teacher-present-2.png" class="">
                <div>
                    <h1>	
                    Delivery time is fast,<br>
                    Safe Post Office Courier (EMS)
                    Recommended.</h1>
                    <span>
                        What is Post Office EMS (Express Mail Service) service?<br>
                        Fastest and safest delivery of urgent letters, documents or parcels to foreign countries<br>
                        Ministry of Friendship and Business, National Institute as International Postal Service<br>
                        It is treated according to a special agreement with a psycho-foreign foreign postal agency.<br>
                        <a href="">http://www.epost.go.kr</a> or <a href="">http://www.koreapost.go.kr</a><br>
                        Can be viewed in all directions.<br>
                    </span>
                </div>
    </section>
    <?php
        include "component/footer.php"
    ?>

    
</body>
</html>