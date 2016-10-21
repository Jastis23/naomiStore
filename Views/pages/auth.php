<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
             <?php
                //echo $_SESSION['reg'];
                if ($_SESSION['login'])
                    echo "<h2>Вы авторизованы</h2>";
                ?>
                <div class="login-form"><!--login form-->
                    <h2>Войти в аккаунт</h2>
                    <form action="index.php">
                        <input type="hidden" name="view" value="AuthMethod" />
                        <input name="login" type="text" placeholder="Имя" />
                        <input name="password" type="password" placeholder="Пароль " />
                        <span>
                            <input name="save" value="1" type="checkbox" class="checkbox"> 
                            Запомнить меня
                        </span>
                        <button type="submit" class="btn btn-default">Войти</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">или</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация</h2>
                    <form action="index.php">
                        <input type="hidden" name="view" value="RegisterMethod"/>
                        <input name="login" type="text" placeholder="Имя"/>
                        <input name="password" type="password" placeholder="Пароль"/>
                        <button type="submit" class="btn btn-default">Зарегестрировать</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
