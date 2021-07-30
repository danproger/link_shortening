<div class="main-part mt-3">
    <div class="container">
        <h1><b>Кабинет пользователя</b></h1>
        <div class="d-flex flex-column">
            <div class="my-3">
                <h4>Привет, <b><?= $_COOKIE['logged'] ?></b></h4>
            </div>
            <div>
                <form action="<?= DASHBOARD; ?>" method="POST">
                    <input type="hidden" name="exit-btn">
                    <button class="q-btn">
                        Выйти
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>