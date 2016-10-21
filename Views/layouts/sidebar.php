<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Категории</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">

                    </h4>
                </div>
                <div id="sportswear" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
            <?php
            $links = new ViewGetTools;
            foreach ($links->GetLinks() as $link) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="index.php?view=category&id=<?echo $link['category_id']?>"><?echo $link['name']?></a></h4>
                    </div>
                </div>
                <?
                }
                ?>
            </div><!--/category-productsr-->
            <div class="brands_products"><!--brands_products-->
                <h2>Фирма</h2>
                <div class="brands-name">
                    <ul class="nav nav-pills nav-stacked">
                        <?
                        $links=new ViewGetTools;
                        foreach($links->ShowBrands() as $brand)
                        {?>
                        <li><a href="index.php?view=brand&id=<?echo $brand['brand']?>"> <span class="pull-right">(<?= $brand['total'] ?>)</span><?= $brand['brand'] ?></a></li>
                    <?}?>
                </ul>
            </div>
        </div><!--/brands_products-->
    </div>
</div>	

