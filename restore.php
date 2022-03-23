<?php
    $bdd = new PDO('mysql:host=localhost;dbname=user;','root','');
    $allusers= $bdd->query('SELECT * FROM history');

    // if($allusers->rowCount()>0){
    //     while($user = $allusers->fetch()){

    //     }
    // }
    
    // $userid = intval($_GET['id']);
    // $sql = "SELECT `id_prod`,`image`, `name`, `price`, `comments`,`meth` FROM `history` WHERE id=:new_id";
    // $query = $bdd->prepare($sql);
    // $query  -> bindParam(':new_id',$userid,PDO::PARAM_STR);
    // $query->execute();
    // $resultat = $query->fetchAll(PDO::FETCH_OBJ);
 
    //  foreach ($resultat as $row) {
    //     $name = $row-> name;
    //     $price = $row-> price;
    //     $comment = $row-> comments;
    //     $image = $row-> image;
    //     $useridold = $row-> id_prod;
    //     $meth = $row-> meth;
    //     if (strval($meth) == "UPDATE" ) {
    //         $meth_final = "UPDATE";
    //     }elseif(strval($meth) == "DELETE"){
    //         $meth_final = "DELETE";
    //     }else{
    //         $meth_final = "INSERT";
    //     }
    //  }

    // if (isset($_GET[$meth_final])) {    

    //     $sql = "UPDATE `products` SET `image`=:pic,`name`=:nom, `price`=:price, `comments`=:comment WHERE id=:new_id";
    //     $stmt= $bdd->prepare($sql);

    //     $stmt ->bindParam(':pic', $picProfile);
    //     $stmt ->bindParam(':nom', $name);
    //     $stmt ->bindParam(':price', $price);
    //     $stmt ->bindParam(':comment', $comment);
    //     $stmt ->bindParam(':new_id', $useridold);
    //     $stmt->execute();

    //     echo "<script>window.location.href='done.php'</script>";
       
    // }elseif (isset($_GET[$meth_final])) { 

    //     $sql = "INSERT INTO `products`(`image`,`name`, `price`, `comments`) VALUES (?,?,?,?)";
    //     $stmt= $con->prepare($sql);

    //     $stmt->bind_param("ssss",$image, $name, $price,$comment);

    //     // $stmt->bind_param($picProfile, $name, $price,$comment,$userid);
    //     // $stmt ->bindParam(':pic', $picProfile);
    //     // $stmt ->bindParam(':nom', $name);
    //     // $stmt ->bindParam(':price', $price);
    //     // $stmt ->bindParam(':comment', $comment);
    //     // $stmt ->bindParam(':new_id', $userid);
    //     $stmt->execute();

    //     echo "<script>window.location.href='done.php'</script>";
       
    // }elseif (isset($_GET[$meth_final])) { 

    // $sql = "DELETE FROM products WHERE id=:id";
    // $query = $bdd->prepare($sql);
    // $query  -> bindParam(':id',$useridold,PDO::PARAM_STR);
    // $query->execute();

    //     echo "<script>window.location.href='done.php'</script>";
       
    // }else{
    //     echo '<script>alert("Failed to restore")</script>';
    // }
   ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Update</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .mil {
        margin: 30%;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center bg-light">
    <main class="mil">
        <div class="">
            <a href="prod.php" class="link-secondary pr-2 pb-5">Dashboard</a>
            <a href="index.php" class="link-secondary p-2 pb-5">Sign Up</a>

            <h2>Product</h2>
            <div class=" text-center">
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam tenetur beatae doloremque
                    magni consequuntur.</p>
            </div>
            <?php
     $userid = intval($_GET['id']);
     $sql = "SELECT `image`, `name`, `price`, `comments`,`meth` FROM `history` WHERE id=:new_id";
     $query = $bdd->prepare($sql);
     $query  -> bindParam(':new_id',$userid,PDO::PARAM_STR);
     $query->execute();
     $resultat = $query->fetchAll(PDO::FETCH_OBJ);
 
     foreach ($resultat as $row) {
         
         ?>


            <form enctype="multipart/form-data" action="rest.php" method="GET">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="nom" type="text" class="form-control" id="name" placeholder="Ex: Rolex"
                        accept="*/image" value="<?php echo $row-> name ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="text" class="form-control " id="price" placeholder="Ex: 50,60,40,..."
                        value="<?php echo $row-> price ?>" disabled>
                </div>
                <div class="input-group mt-3 mb-2">
                    <div class="custom-file text-center">
                        <img src="<?php echo $row-> image ?>" alt="Image" srcset="<?php echo $row-> image ?>" class="img-fluid image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" class="form-control mb-4" rows="5"
                        id="comment" disabled><?php echo $row-> comments ?></textarea>
                </div>

                <button type="submit" name="<?php echo strval($row-> meth) ?>" class="btn w-100 btn btn-lg btn-primary" type="submit">Restore your : <?php echo $row-> meth ?>
                </button>
                <?php }?>
            </form>
        </div>
    </main>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>

</html>