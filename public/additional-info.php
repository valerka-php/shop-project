<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>additional-info</title>
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
<body>
<ul class="nav nav-tabs order-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button"
                role="tab" aria-controls="product" aria-selected="true">About product
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button"
                role="tab" aria-controls="reviews" aria-selected="false">Product Reviews
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">something
        </button>
    </li>
    <div class="btn-home" style="margin-left: auto;margin-right: 25px">
        <a class="btn btn-outline-light bi bi-house" href="/"></a>
    </div>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
        <h1>Bicycle</h1>
        <hr>
        <div class="product">
            <img src="images/motorcycle1.jpg">
            <div class="product-cart">
                <h5>Sale Price:</h5>
                <p class="price">$155.00</p>
                <h4 style="color: red">You save $1000.00</h4>
                <h4>Our price <s>$1155.00</s></h4>
                <hr>
                <button class="btn btn-outline-success bi bi-bag"> add to cart </button>
            </div>
        </div>
        <div class="description">
            <h2>Description</h2>
            <ul class="description-list">
                <li>
                    <b>ALX XC SPORT Aluminum FRAME</b><br>
                    Ligh & durable, butted and hydroformed 6061 aluminum frame features 73mm threaded bottom bracket,
                    internal cable routing and Boost 141 rear axle for increased wheel strength & better tire clearance.
                </li>
                <li>
                    <b>MODERN XC GEOMETRY</b><br>
                    Using the most of the modern features, Xtrada models utilise slack head tube and steep seat tube angle to ensure that the bike handles perfectly and travels effortessly up and down the mountain.</li>
                <li>
                    <b>SHIMANO DEORE M4100 2X10 SPEED DRIVETRAIN</b><br>
                    The new and easy-to-use Deore groupset guarantees quick and precise shifting over its 2x10 wide-range gears combined with 11-42t cassette.</li>
                <li>
                    <b>INTERNAL CABLE ROUTING</b><br>
                    Xtrada models use full internl routing with all-new internal cable routing system, providing a clean and rattle free cable set up.</li>

            </ul>
        </div>

    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">...</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
</div>
</body>
</html>
