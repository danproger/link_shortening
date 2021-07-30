<div class="main-part mt-3">
    <div class="container">
        <div class="text-center">
            <div>
                <h1><b>Обратная связь</b></h1>
            </div>
            <div>
                <p>
                    Напишите нам, если у вас есть вопросы
                </p>
                <form action="<?= CONTACT; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-3 col-lg-4"></div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column">
                            <input class="w-100" type="text" name="name" placeholder="Введите имя" value="<?= $_POST['name']; ?>">
                            <input class="my-3 w-100" type="email" name="email" placeholder="Введите email" value="<?= $_POST['email']; ?>">
                            <input class="w-100" type="text" name="age" placeholder="Введите возраст" value="<?= $_POST['age']; ?>">
                            <textarea class="mt-3 w-100" name="message" rows="8" placeholder="Введите текст сообщения"><?= $_POST['message']; ?></textarea>
                            <div class="text-start">
                                <div class="error my-3"><?= $data['error']; ?></div>
                                <div class="success my-3"><?= $data['success']; ?></div>
                                <div>
                                    <button class="q-btn" type="submit">
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>