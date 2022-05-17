<?php
    $bdd = new PDO('mysql:host=localhost;dbname=user;','root','');
    $allusers= $bdd->query('SELECT * FROM history');

    // if($allusers->rowCount()>0){
    //     while($user = $allusers->fetch()){

    //     }
    // }
    
    $userid = intval($_GET['id']);
    $sql = "SELECT `id_prod`,`image`, `name`, `price`, `comments`,`meth` FROM `history` WHERE id=:new_id";
    $query = $bdd->prepare($sql);
    $query  -> bindParam(':new_id',$userid,PDO::PARAM_STR);
    $query->execute();
    $resultat = $query->fetchAll(PDO::FETCH_OBJ);
 
     foreach ($resultat as $row) {
        $name = $row-> name;
        $price = $row-> price;
        $comment = $row-> comments;
        $image = $row-> image;
        $useridold = $row-> id_prod;
        $meth = $row-> meth;
        if (strval($meth) == "UPDATE" ) {
            $meth_final = "UPDATE";
        }elseif(strval($meth) == "DELETE"){
            $meth_final = "DELETE";
        }else{
            $meth_final = "INSERT";
        }
     }

    if (isset($_GET[$meth_final])) {    

        $sql = "UPDATE `products` SET `image`=:pic,`name`=:nom, `price`=:price, `comments`=:comment WHERE id=:new_id";
        $stmt= $bdd->prepare($sql);

        $stmt ->bindParam(':pic', $picProfile);
        $stmt ->bindParam(':nom', $name);
        $stmt ->bindParam(':price', $price);
        $stmt ->bindParam(':comment', $comment);
        $stmt ->bindParam(':new_id', $useridold);
        $stmt->execute();

        echo "<script>window.location.href='done.php'</script>";
       
    }elseif (isset($_GET[$meth_final])) { 

        $sql = "INSERT INTO `products`(`image`,`name`, `price`, `comments`) VALUES (?,?,?,?)";
        $stmt= $con->prepare($sql);

        $stmt->bind_param("ssss",$image, $name, $price,$comment);

        // $stmt->bind_param($picProfile, $name, $price,$comment,$userid);
        // $stmt ->bindParam(':pic', $picProfile);
        // $stmt ->bindParam(':nom', $name);
        // $stmt ->bindParam(':price', $price);
        // $stmt ->bindParam(':comment', $comment);
        // $stmt ->bindParam(':new_id', $userid);
        $stmt->execute();

        echo "<script>window.location.href='done.php'</script>";
       
    }elseif (isset($_GET[$meth_final])) { 

    $sql = "DELETE FROM products WHERE id=:id";
    $query = $bdd->prepare($sql);
    $query  -> bindParam(':id',$useridold,PDO::PARAM_STR);
    $query->execute();

        echo "<script>window.location.href='done.php'</script>";
       
    }else{
        echo '<script>alert("Failed to restore")</script>';
    }
   ?>