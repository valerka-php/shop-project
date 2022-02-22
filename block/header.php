<div class="dropdown">
    <button class="btn btn-outline-light dropdown-toggle bi bi-stack " role="button" id="dropdownMenuLink"
            data-bs-toggle="dropdown" aria-expanded="false">
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <ul class="nav nav-pills mb-3 list" id="pills-tab" role="tablist">
            <?php $productArr = include 'inventory/product_list.php'; ?>
            <?php foreach ($productArr as $category => $list) : ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="<?= $category . '-tab' ?>" data-bs-toggle="pill"
                            data-bs-target="<?= '#pills-' . $category ?>" type="button" role="tab"
                            aria-controls="pills-<?= $category ?>"
                            aria-selected="false"><img class="img-nav-item" src="img/<?= $category . '.png' ?>">
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </ul>
</div>
<div class="btn-home">
    <a class="btn btn-outline-light bi bi-house" href="/"></a>
</div>
<div class="search bi bi-search">
    <input class="input-search" placeholder="what do you want ?"/>
    <button class="btn btn-outline-light btn-search"> search</button>
</div>
<div class="contacts">
    <button type="button" class="btn btn-outline-light bi bi-at"></button>
    <button type="button" class="btn btn-outline-light bi bi-telegram"></button>
    <button type="button" class="btn btn-outline-light bi bi-telephone"></button>
</div>
<div class="btn-order">
    <button type="button" class="btn btn-outline-light bi bi-cart3 cart" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop"></button>
</div>
<div class="btn-sing-in">
    <a class="btn btn-outline-light bi bi-person-circle" href="include/sing-in.inc.php"></a>
</div>