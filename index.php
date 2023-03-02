<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <section class="container">
  <div class="box">
  <form action="" method="post">  <!--Form created which contains email and a submit button-->
    email : <input type="email" name="emailid"><br><br>  <!--email input-->
    <button type="submit" name="submit">Submit</button><br><br>  <!--Submit button-->
    <?php   //php started
    include 'action.php';  //copy the code of action.php in index.php
    ?> 
  </form>
</div> 
  </section>
</body>
</html>
