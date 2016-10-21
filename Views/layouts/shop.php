<!DOCTYPE html>
<html lang="en">
    <?php
    require('head.php');
    if ($view != '404') {
        ?>
        <body>
            <?require('header.php');?>
            <section>
                <div class="container">
                    <div class="row">

                        <?php
                        //Проверка для того, что бы не выводилися сайдбар - Костыль
                        if (($view !== 'cart') && ($view !== 'orders') && ($view !== 'auth')) { // && ($view!=='compare')
                            require('Views/layouts/sidebar.php');
                        }
                        ?>
                        <div class="col-sm-9 padding-right">
                            <!--<div class="features_items">features_items-->
                            <?php
                            require('Views/pages/' . $view . '.php');
                            //Проверка для вывода или не вывода пагинации - Костыль
                            if ($view == 'category') {
                                ?>	
                                <ul class="pagination">
                                    <li class="active"><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">&raquo;</a></li>
                                </ul>
                                <?
                                }
                                ?>
                                <!--</div>features_items-->
                            </div>
                        </div>
                    </div>
                </section>
                <?require('footer.php');?>
                <?require('footer_scripts.php');?>
            </body>
        </html>
        <?php
        //Вывод 404 ошибки
        } else
        
        require('Views/pages/'.$view.'.php');
        
        ?>