<?php
require_once './include/class.user.php';
require_once './include/class.article.php';
$User = new User();
session_start();
if(!$User->get_session()){
    header("location: ./index.php");
}

$article = new Article();

$Articles = $article->getAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />

    <!-- Style -->
    <link rel="stylesheet" href="style.css">

    <title>Blog</title>
  </head>
  <body>
    <header class="bg-white shadow-lg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                        <h1 class="text-success h3">Simple Blog</h1>
                </div>
                <div class="col text-right">
                    <a href="./controllers/logout.php" class="btn btn-danger btn-lg rounded-0 text-dark">Logout <i class="fas fa-sign-out-alt text-light py-2"></i></a>
                </div>
            </div>
        </div>
    </header>
    <main class="content"style="background-color:#FFFBF2;">
        <section class="title">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left py-3">
                    <h2 class="display-4">Dashboard</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 bg-white border rounded shadow-lg p-4 mb-5">
                    <div class="row mb-3">
                        <div class="col"><span class="h2">Les Article</span></div>
                        <div class="col-auto"><a href="./add.php" class="btn btn-success btn-lg text-dark"style="background-color:#ABEE94;"><i class="far fa-newspaper text-white"></i> Ajouter</a></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-borderless">
                                <thead class="border-bottom">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>image</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                <?php foreach($Articles as $articl){ ?>
                                    <tr class="border-bottom">
                                        <td><?= $articl['id'] ?></td>
                                        <td><?= $articl['title'] ?></td>
                                        <td><?= $articl['slug']?></td>
                                        <td><img width="80" src="<?= $articl['image'] ?>" alt="<?= $articl['title'] ?>"></td>
                                        <td class="d-flex">
                                            <a href="./single.php?id=<?= $articl['id'] ?>" class="btn btn-primary btn-sm mx-1"><i class="fas fa-eye"></i></a>
                                            <a href="./edit.php?id=<?= $articl['id'] ?>" class="btn btn-success btn-sm mx-1"><i class="fas fa-pen text-white"></i></a>
                                            <a href="./controllers/delete.php?id=<?= $articl['id'] ?>" class="btn btn-danger btn-sm mx-1"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </main>

</body>
</html>