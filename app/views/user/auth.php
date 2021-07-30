<div class="main-part mt-3 py-5">
    <div class="container pt-2">
        <div class="text-center">
            <div>
                <h1 class="main-title">Сокра.тим</h1>
            </div>
            <?php if (!isset($_COOKIE['logged'])): ?>
                <div>
                    <p>
                        Авторизация
                    </p>
                    <form action="<?= USER_AUTH; ?>" method="POST">
                        <div class="row">
                            <div class="col-md-3 col-lg-4"></div>
                            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column">
                                <input class="w-100" type="text" name="login" placeholder="Введите логин" value="<?= $_POST['login']; ?>">
                                <input class="mt-3 w-100" type="password" name="password" placeholder="Введите пароль">
                            </div>
                            <div class="col-md-3 col-lg-4"></div>
                        </div>
                        <div class="error my-3"><?= $data['error']; ?></div>
                        <div class="text-center">
                            <button class="q-btn" type="submit">
                                Войти
                            </button>
                            <p class="mt-2">
                                Ещё нет аккаунта? <a class="q-link" href="<?= USER_REG; ?>">Зарегистрироваться</a>
                            </p>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <div class="text-center mt-5">
                    <h2>Вы уже авторизованы!</h2>
                    <br>
                    <a href="<?= MAIN; ?>">
                        <button class="q-btn">
                            На главную
                        </button>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>