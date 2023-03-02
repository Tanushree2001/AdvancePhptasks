<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("action.php");  ?>
    <div class="container">

<?php foreach ($services as $service): ?>
    <div class="service">
    <h2><?php echo $Action->heading; ?></h2>
    <h2><?php echo $Action->content; ?></h2>
    
    <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $Action->images; ?>" alt="">
</div>
<?php endforeach; ?>
</div>
</body>
</html>