<div class="col-sm-9">
    <div class="blog-post-area">
        <h2 class="title text-center">Последние новости</h2>
        <?php
        $id = $_GET['id'];
        foreach (NewsModel::OneNew($id) as $item) {
        }
        ?>
        <div class="single-blog-post">
            <h3><?= $item['title'] ?></h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> <?= $item['author'] ?></li>
                    <li><i class="fa fa-clock-o"></i><?= $item['time'] ?></li>
                    <li><i class="fa fa-calendar"></i> <?= $item['date'] ?></li>
                </ul>
            </div>
            <a href="">
                <img src="public/images/<?= $item['image'] ?>" alt="">
            </a>
            <p>
<?= $item['text'] ?>
            </p> <br>
        </div>
    </div><!--/blog-post-area-->
</div><!--Comments-->