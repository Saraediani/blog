<?php

require_once './include/class.user.php';
require "./include/class.article.php";
$User = new User();
session_start();
if(!$User->get_session()){
    header("location: ./index.php");
}

if(isset($_GET['id'])){
$Article = new Article();
$oldArticle = $Article->find($_GET['id']);

}else{
    die("Article not found!");
}
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                    <h2 class="display-4">Edit Article</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 bg-white border rounded shadow-lg p-4 mb-5">
                    <div class="row mb-3">
                        <div class="col"><span class="h2">Edit Article</span></div>
                        <div class="col-auto"><a href="./dashboard.php" class="btn btn-success btn-lg text-dark"style="background-color:#ABEE94;"><i class="far fa-newspaper text-white"></i> Home</a></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="./controllers/adit.php" method="post">
                            <input type="hidden" name="id" value="<?= $oldArticle['id'] ?>">
                                <div class="form-group">
                                    <input value="<?= $oldArticle['title'] ?>" type="text" name="title" placeholder="Title..." class="form-control">
                                </div>
                                <div class="form-group">
                                    <input value="<?= $oldArticle['slug'] ?>" type="text" name="slug" placeholder="slug..." class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea style="min-height:350px;" name="body" id="body" class="form-control summernote" placeholder="Content..."><?= $oldArticle['body'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input value="<?= $oldArticle['image'] ?>" type="text" name="image" placeholder="Image url..." class="form-control">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="submit" class="btn-lg btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="./assets/js/add.js"></script>
</body>
</html>