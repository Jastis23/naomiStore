<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('head.php'); ?>
    </head>
    <body>
        <section id="container" >
            <!--header start-->
            <header class="header black-bg">
                <?php require('header.php'); ?>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <?php require('aside.php'); ?>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <?php require('Views/admin_pages/'.$view.'.php'); ?>
                    <div class="row">				
                    </div><!-- /row -->	
                    </div><!-- /col-lg-9 END SECTION MIDDLE -->
                    </div><! --/row -->
                </section>
            </section>
            <!--main content end-->
            <!--footer start-->
            <?php require('footer.php'); ?>
            <!--footer end-->
        </section>
        <?php require('footer_scripts.php'); ?>
    </body>
</html>
