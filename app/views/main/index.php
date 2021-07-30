<div class="main-part mt-3 mb-3 pt-5">
    <div class="container pt-2">
        <div class="text-center">
            <div>
                <h1 class="main-title">Сокра.тим</h1>
            </div>
            <div>
                <p>
                    Вам нужно сократить ссылку? Сейчас мы это сделаем!
                </p>
                <form action="<?= MAIN; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-3 col-lg-4"></div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column">
                            <input class="w-100" type="text" name="link" placeholder="Длинная ссылка" value="<?= $_POST['link']; ?>">
                            <input class="mt-3 w-100" type="text" name="reduction" placeholder="Короткое название" value="<?= $_POST['reduction'] ?>">
                        </div>
                        <div class="col-md-3 col-lg-4"></div>
                    </div>
                    <div class="error mt-3 mb-4"><?= $data['error']; ?></div>
                    <div class="text-center">
                        <button class="q-btn" type="submit">
                            Уменьшить
                        </button>
                    </div>
                </form>
            </div>
            <div class="mt-5 pt-5">
                <div class="row">
                    <div class="col-md-2 col-lg-3"></div>
                    <div class="col-12 col-md-8 col-lg-6 d-flex flex-column">
                        <?php if (isset($data['links']) && $data['links'] != []): ?>
                            <h1><b>Сокращенные ссылки</b></h1>
                            <?php foreach ($data['links'] as $link_block): ?>
                                <div class="q-link-block text-start p-4 my-2">
                                    <p>
                                        Длинная:
                                        <span><a href="<?= $link_block->link; ?>" target="_blank" class="q-ll">
                                            <?= $link_block->link; ?>
                                        </a></span>
                                    </p>
                                    <p class="my-2">
                                        Короткая:
                                        <a href="<?= PATH . 'l//' . $link_block->reduction; ?>" target="_blank" class="q-ll">
                                            <?= PATH . 'l//' . $link_block->reduction; ?>
                                        </a>
                                    </p>
                                    <form action="MAIN" method="POST">
                                        <input type="hidden" name="delete-link" value="<?= $link_block->id; ?>">
                                        <button class="q-btn-sm">
                                            Удалить
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2 col-lg-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>