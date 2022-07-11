<div class="tab-content" id="pills-tabContent ">
    <?php $productList = require '../src/inventory/product_list.php' ?>
    <?php foreach ($productList as $category => $list) : ?>
        <div class="tab-pane fade " id="<?= 'pills-' . $category ?>" role="tabpanel"
             aria-labelledby="<?= 'pills-' . $category . '-tab' ?>">
            <div class="content background-shop">
                <?php for ($i = 1; $i <= count($list); $i++) : ?>
                    <div class="card" style="width: 18rem;">
                        <img src="images/<?= $category . $i ?>.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $list[$i - 1]['name'] ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                            <hr>
                            <div class="pay">
                                <a href="additional-info.php" class="btn btn-primary">additional
                                    info</a>
                                <hr>
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