<?php
$id = $_GET['id'];
foreach (ViewGetTools::OneProduct($id) as $item) {
}
?>
<section>
    <div class="container">
        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="public/images/<?= $item['image']; ?>" alt="" />
                    </div>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <!-- Controls -->
                        <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <h2><?= $item['title']; ?></h2>
                        <span>
                            <span><?= number_format($item['price'], 2); ?> грн</span>
                            <!--<label>Количество:</label>
                            <input type="text" value="3" />-->
                            <a href="index.php?view=AddToCart&id=<?echo $item['id'];?>">
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Купить
                                </button></a>
                        </span>
                        <p><b>Availability:</b> In Stock</p>
                        <p><b>Состояние:</b> Новое</p>
                        <p><b>Брэнд:</b> <?= $item['brand']; ?></p>
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->
            <div class="category-tab shop-details-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#reviews" data-toggle="tab">Подробно</a></li>
                    </ul>
                </div>
                <div class="tab-pane fade active in" id="reviews" >
                    <div class="col-sm-12">

                        <p><?= $item['discription'] ?></p>
                    </div>
                </div>
            </div>
            <!--/category-tab-->
			<!--recommended_items-->
            <!--<div class="recommended_items">
                <h2 class="title text-center">Рекомендуемые товары</h2>
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">	
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="Views/images/home/recommend1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>			
                </div>
            </div>-->
			<!--/recommended_items-->	
        </div>
    </div>
</section>