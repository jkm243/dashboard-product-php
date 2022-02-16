<?php

  $bdd = new PDO('mysql:host=localhost;dbname=user;','root','');
  $allusers= $bdd->query('SELECT * FROM products');

  if (isset($_GET['name']) AND !empty($_GET['name'])){
    $recherche = htmlspecialchars($_GET['name']);
    $allusers = $bdd ->query('SELECT * FROM products WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC');
  }
  if(isset($_REQUEST['del'])){
    $sup = intval($_GET['del']);
    
    $sql = "DELETE FROM products WHERE id=:id";
    $query = $bdd->prepare($sql);
    $query  -> bindParam(':id',$sup,PDO::PARAM_STR);
    $query->execute();

    echo "<script>window.location.href='prod.php'</script>";
  }

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
        <div class="row">
            <nav id="sidebarMenu" class="col-md-5 col-lg-4 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class=" modif p-5 bg-light">
                        <a href="prod.php" class="link-secondary pr-2 pb-5">Dashboard</a>
                        <a href="index.php" class="link-secondary p-2 pb-5">Sign Up</a>

                        <h2>Element</h2>
                        <form enctype="multipart/form-data" action="add.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="nom" type="text" class="form-control" id="name" placeholder="Ex: Rolex"
                                    accept="*/image" >
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input name="price" type="text" class="form-control " id="price"
                                    placeholder="Ex: 50,60,40,...">
                            </div>
                            <div class="input-group mt-3 mb-2">
                                <div class="custom-file">
                                    <input name="images" type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea name="comment" class="form-control mb-4" rows="5" id="comment" ></textarea>
                            </div>

                            <button type="submit" name="ajouter" class="btn w-100 btn btn-lg btn-primary"
                                type="submit">Add
                                product</button>
                        </form>
                    </div>
                </div>
            </nav>

            <main class="col-md-2 ms-sm-auto col-lg-8 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 pt-5">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>
                <form class="form-inline" method="GET">
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Products" aria-label="Name of product"
                                aria-describedby="basic-addon2" name="name">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

                <h2>Section title</h2>
                <div class="table-responsive">
                <!-- table table-striped table-sm -->
                    <table class="display " id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Comment</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                  if($allusers->rowCount()>0){
                    while($user = $allusers->fetch()){
                      ?>
                            <tr>
                                <td ><?= $user['id']; ?></td>
                                <td >
                                    <!-- php echo '<img src="data:image;base64,'.base64_encode($user['image']).' " class="img-fluid image" alt="" srcset="">' ?> -->
                                    <img src="img/<?= $user['image'];?>.png" alt="Image" srcset="" class="img-fluid image">  
                                </td>
                                <td ><?= $user['name']; ?></td>
                                <td ><?= $user['price']; ?></td>
                                <td ><?= $user['comments']; ?></td>
                                <td >
                                    <a href="update.php?id=<?php echo $user['id'];?>">
                                    <button type="button" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                    </a>

                                    <a href="prod.php?del=<?php echo $user['id'];?>">
                                    <button type="button" class="btn btn-outline-danger" onClick="return confirm('Do you want to delete?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
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
        } );
    });
    </script>

</body>

</html>