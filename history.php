<<<<<<< HEAD
<?php

  $bdd = new PDO('mysql:host=localhost;dbname=user;','root','');
  $allusers= $bdd->query('SELECT * FROM history');

//   if(isset($_REQUEST['rest']) ){
//     // if($allusers->rowCount()>0){
//         while($user = $allusers->fetch()){ 
//             if($user['meth'] = 'INSERT'){
//                 $sup = intval($_GET['rest']);
//                 $sql = "DELETE FROM products WHERE id=:id";
//                 $query = $bdd->prepare($sql);
//                 $query  -> bindParam(':id',$sup,PDO::PARAM_STR);
//                 $query->execute();

//             }elseif($user['meth'] = 'UPDATE'){
//                 $sql = "UPDATE `products` SET `image`=:pic,`name`=:nom, `price`=:price, `comments`=:comment WHERE id=:id_prod"; 
//                 $stmt= $bdd->prepare($sql);
//                 $stmt ->bindParam(':pic', $user['image']);
//                 $stmt ->bindParam(':nom', $user['name']);
//                 $stmt ->bindParam(':price', $user['price']);
//                 $stmt ->bindParam(':comment', $user['comments']);
//                 $stmt ->bindParam(':id_prod', $user['id_prod']);
//                 $stmt->execute();

//             }elseif($user['meth'] = 'DELETE'){
//                 $sql = "INSERT INTO `products`(`image`,`name`, `price`, `comments`) VALUES (?,?,?,?)";
//                 $stmt= $con->prepare($sql);
//                 $stmt->bind_param("ssss",$user['image'], $user['name'], $user['price'],$user['comments']);
//             }
//         }
//     }
//     //  echo "<script>window.location.href='prod.php'</script>";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jacqueskatsuva">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
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
    </style>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row p-5">
            <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12 ">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 pt-5">History</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="me-2">
                            <a href="prod.php" class="link-secondary pr-2 pb-5">Dashboard</a>
                            <a href="index.php" class="link-secondary p-2 pb-5">Sign Up</a>
                        </div>

                    </div>
                </div>


                <h2>All changement</h2>
                <div class="table-responsive">
                    <!-- table table-striped table-sm -->
                    <table class="display " id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">id_prod</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Method</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                  if($allusers->rowCount()>0){
                    while($user = $allusers->fetch()){
                      ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['id_prod']; ?></td>
                                <td>
                                    <!-- <php echo '<img src="data:image;base64,'.base64_encode($user['image']).' " class="img-fluid image" alt="" srcset="">' ?> -->
                                    <img src="img/<?= $user['image'];?>" alt="Image" srcset="img/<?= $user['image'];?>"
                                        class="img-fluid image">
                                </td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['price']; ?></td>
                                <td><?= $user['comments']; ?></td>
                                <td><?= $user['meth']; ?></td>
                                <td><?= $user['date_mod']; ?></td>
                                <td>

                                    <a href="restore.php?id=<?php echo $user['id'];?>">
                                        <button type="button" class="btn btn-outline-danger"
                                            onClick="return confirm('Do you want to restore?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                <path
                                                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php        
                            }
                         }
                      ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#example').DataTable();
        });
    });
    </script>

</body>

=======
<?php

  $bdd = new PDO('mysql:host=localhost;dbname=user;','root','');
  $allusers= $bdd->query('SELECT * FROM history');

  if(isset($_REQUEST['rest'])){
    // if($allusers->rowCount()>0){
        while($user = $allusers->fetch()){ 
            if($user['meth'] = 'INSERT'){
                $sup = intval($_GET['rest']);
                $sql = "DELETE FROM products WHERE id=:id";
                $query = $bdd->prepare($sql);
                $query  -> bindParam(':id',$sup,PDO::PARAM_STR);
                $query->execute();

            }elseif($user['meth'] = 'UPDATE'){
                $sql = "UPDATE `products` SET `image`=:pic,`name`=:nom, `price`=:price, `comments`=:comment WHERE id=:id_prod"; 
                $stmt= $bdd->prepare($sql);
                $stmt ->bindParam(':pic', $user['image']);
                $stmt ->bindParam(':nom', $user['name']);
                $stmt ->bindParam(':price', $user['price']);
                $stmt ->bindParam(':comment', $user['comments']);
                $stmt ->bindParam(':id_prod', $user['id_prod']);
                $stmt->execute();

            }elseif($user['meth'] = 'DELETE'){
                $sql = "INSERT INTO `products`(`image`,`name`, `price`, `comments`) VALUES (?,?,?,?)";
                $stmt= $con->prepare($sql);
                $stmt->bind_param("ssss",$user['image'], $user['name'], $user['price'],$user['comments']);
            }
        }
    }
    //  echo "<script>window.location.href='prod.php'</script>";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
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
    </style>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row p-5">
            <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12 ">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 pt-5">History</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="me-2">
                            <a href="prod.php" class="link-secondary pr-2 pb-5">Dashboard</a>
                            <a href="index.php" class="link-secondary p-2 pb-5">Sign Up</a>
                        </div>

                    </div>
                </div>


                <h2>All changement</h2>
                <div class="table-responsive">
                    <!-- table table-striped table-sm -->
                    <table class="display " id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">id_prod</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Method</th>
                                <th scope="col">Date</th>
                                <th scope="col">Transaction</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                  if($allusers->rowCount()>0){
                    while($user = $allusers->fetch()){
                      ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['id_prod']; ?></td>
                                <td>
                                    <!-- <php echo '<img src="data:image;base64,'.base64_encode($user['image']).' " class="img-fluid image" alt="" srcset="">' ?> -->
                                    <img src="img/<?= $user['image'];?>" alt="Image" srcset="img/<?= $user['image'];?>"
                                        class="img-fluid image">
                                </td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['price']; ?></td>
                                <td><?= $user['comments']; ?></td>
                                <td><?= $user['meth']; ?></td>
                                <td><?= $user['date_mod']; ?></td>
                                <td><?= $user['transaction']; ?></td>
                                <td>

                                    <a href="history.php?rest=<?php echo $user['id'];?>">
                                        <button type="button" class="btn btn-outline-danger"
                                            onClick="return confirm('Do you want to restore?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                <path
                                                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php        
                            }
                         }
                      ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#example').DataTable();
        });
    });
    </script>

</body>

>>>>>>> 17ff0de875dfc488fd68682aba9029dac8242080
</html>