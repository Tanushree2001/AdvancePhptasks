<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<style>
*, body{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}
.container{
  max-width: 1300px;
  margin: 0 auto;
}
.image_block{
  width: 50%;
}
.inner_container{
  width: 100%;
  margin: 70px;
  display: flex;
}
.content_block{
  width: 50%;
  height: 400px;
}
.image{
  height: 400px;
  width: auto;
}
.logo{
  width: auto;
  height: 80px;
  margin: 15px;
}
li{
  font-family: 'ss-semibold';
  list-style: none;
  position: relative;
  padding-left: 24px;
  margin: 0 0 20px;
  line-height: 1.4;
}
li a{
  text-decoration: none;
  color: #4b5561;
}
.service-secondary-title {
  font-size: 3rem;
  line-height: 1.4;
  text-transform: uppercase;
  font-family: "ss-bold";
}
.service-title{
  font-size: 3rem;
  line-height: 1.4;
  text-transform: uppercase;
  font-family: "ss-bold";
  color: #ff7900;
}
</style>
<body>
    <section class="container">
    <?php
    include("action.php");  ?>
    </section>
</body>
</html>