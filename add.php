
<?php
    $name = $_POST['nom'];
    $price = $_POST['price'];
    $comment = $_POST['comment'];
    
    // Database connection
    $con = new mysqli("localhost","root","","user");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    } else{
        if (isset($_POST['ajouter'])) { 
            $rd = rand(1000,1000000);
            $tr= "TR_".$rd;
            $images=$_FILES['images']['name'];
            $imageSize=$_FILES['images']['size'];
            $tmp_dir=$_FILES['images']['tmp_name'];
            $updir='img/';
            $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
            $valid_extensions=array('jpeg','jpg','png','gif','pdf');
            $picProfile=rand(1000,1000000).".".$imgExt;
            move_uploaded_file($tmp_dir,$updir.$picProfile);

            $sql = "INSERT INTO `products`(`image`,`name`, `price`, `comments`) VALUES (?,?,?,?)";
            $stmt= $con->prepare($sql);

            $stmt->bind_param("ssss",$picProfile, $name, $price,$comment);
            // $stmt ->bindParam(':pic', $picProfile);
            // $stmt ->bindParam(':nom', $name);
            // $stmt ->bindParam(':price', $price);
            // $stmt ->bindParam(':comment', $comment);
            

                //execution requete préparé
            $confirmation = $stmt->execute();
            if($confirmation){
                $message = '<i class="checkmark">✓</i>';                
            } else {
                $message = '<i class="checkmark">X</i>';             
            }
        }
    }
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <?php echo $message ?>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
        <a href="prod.php">Dashboard</a>
      </div>
    </body>
</html>