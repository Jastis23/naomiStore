<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +380 50 149 14 04</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> extazy1701@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/profile.php?id=100008397759400" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/solovyovbogdan?lang=ru" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""  target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""  target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://plus.google.com/u/0/118158086935002945444"  target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="public/images/logotip.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php?view=compare"><i class="fa fa-star"></i> Сравнить выбранное (<?php if ($_SESSION['CompareItems']) echo $_SESSION['CompareItems'];
else echo 0; ?>)</a></li>
                            <li><a href="index.php?view=cart"><i class="fa fa-shopping-cart"></i> Корзина (<?php if ($_SESSION['TotalItems']) echo $_SESSION['TotalItems'];
else echo 0; ?>)</a></li>
                            <li><a href="index.php?view=auth"><i class="fa fa-lock"></i> Логин</a></li>
                            <li><a href="index.php?view=ExitMethod"><i class="fa fa-user"></i> Выйти</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php">Главная</a></li>
                            <li class="dropdown"><a href="">Магазин</a>
                                <ul role="menu" class="sub-menu">
                                    <?
                                    $links=new ViewGetTools;
                                    foreach($links->GetLinks() as $link)
                                    {
                                    ?>

                                    <li><a href="index.php?view=category&id=<?echo $link['category_id']?>"><?echo $link['name']?></a></li>

                                    <?
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="index.php?view=book">Мой прогресс</a></li>
                            <li><a href="index.php?view=converter">Программы</a></li>
                            <li><a href="index.php?view=blog">Новости</a></li>
                            <li><a href="index.php?view=motivation">Мотивация</a></li>
                            <li><a href="index.php?view=info">Информация</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="index.php">
                            <input type="hidden" name="view" value="SearchMethod" />
                            <input name="text" type="text" placeholder="Search"/>	
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
