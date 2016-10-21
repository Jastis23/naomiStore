<div class="col-sm-9">
    <div class="blog-post-area">
        <!--<h2 class="title text-center">Последние новости</h2>-->
        <?php
        foreach (NewsModel::GetNews() as $value) {
        ?>		
        <div class="single-blog-post">
            <h3><?= $value['title'] ?></h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> <?= $value['author'] ?></li>
                    <li><i class="fa fa-clock-o"></i><?= $value['time'] ?></li>
                    <li><i class="fa fa-calendar"></i> <?= $value['date'] ?></li>
                </ul>
            </div>
            <a href="">
                <img src="public/images/<?= $value['image'] ?>" alt="">
            </a>
            <p><?= substr($value['text'], 0, 400); ?></p>
            <a  class="btn btn-primary" href="index.php?view=detail&id=<?= $value['id'] ?>">Подробнее</a>
        </div>
        <?}?>
        <div class="pagination-area">
            <ul class="pagination">
                <li><a href="" class="active">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
