<div class="dropdown">
    <button class="btn btn-outline-light dropdown-toggle bi bi-stack " role="button" id="dropdownMenuLink"
            data-bs-toggle="dropdown" aria-expanded="false">
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li class="nav nav-pills mb-3 list" id="pills-tab">
            <?php $productArr = include '../temp/inventory/product_list.php'; ?>
            <?php foreach ($productArr as $category => $list) : ?>
                <?php $link = "/product/?type=" . $category ?>
                <div class="img-nav"><a href="<?= $link ?>"><img class="img-nav-item"
                                                src="/images/<?= $category . '.png' ?>" alt=""></a></div>
            <?php endforeach; ?>
        </li>
    </ul>
</div>
<div class="btn-home">
    <a class="btn btn-outline-light bi bi-house" href="/"></a>
</div>
<div class="contacts">
    <button type="button" class="btn btn-outline-light bi bi-telegram"></button>
    <button type="button" class="btn btn-outline-light bi bi-telephone"></button>
</div>
<mini-cart-button> </mini-cart-button>
<div class="btn-sing-in">
    <a class="btn btn-outline-light bi bi-person-circle" href="/user/login"></a>
</div>
