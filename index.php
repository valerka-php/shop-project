<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>valerjan shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body class="bg-img">
<header class="header">
    <?php require_once 'block/header.php' ?>
</header>
<main class="main">
    <?php require_once 'include/cart.php' ?>
    <section>
        <div class="tab-content" id="pills-tabContent ">
            <?php $productList = include 'inventory/product_list.php' ?>
            <?php foreach ($productList as $category => $list) : ?>
                <div class="tab-pane fade " id="<?= 'pills-' . $category ?>" role="tabpanel" aria-labelledby="<?= 'pills-' . $category . '-tab' ?>">
                    <div class="content background-shop">
                        <?php for ($i = 1; $i <= count($list); $i++): ?>
                            <div class="card" style="width: 18rem;">
                                <img src="img/<?= $category . $i ?>.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $list[$i - 1]['name'] ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><hr>
                                    <div class="pay">
                                        <a href="include/additional-info.html" class="btn btn-primary">additional info</a><hr>
                                        <button class="btn btn-outline-success bi bi-bag"> <?= 'buy $' . $list[$i - 1]['price'] ?></button>
                                        <i> available <?= $list[$i - 1]['count'] ?></i>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
</body>
</html>