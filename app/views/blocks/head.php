<!doctype html>
<html lang="ru">
    <head>
        <!-- BASE META -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- ADDITIONAL META -->
        <?php if (!isset($data['meta-desc'])) { $data['meta-desc'] = TITLE; } ?>
        <meta name="description" content="<?= $data['meta-desc']; ?>">

        <!-- STYLES -->
        <link rel="icon" href="<?= IMG; ?>/icon.ico">
        <link rel="stylesheet" href="<?= CSS; ?>/bt5/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?= CSS; ?>/main.css" type="text/css">

        <!-- FONTS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">

        <?php if (!isset($data['title'])) { $data['title'] = TITLE; } ?>
        <title><?= $data['title']; ?></title>
    </head>
    <body>
        <header class="pt-4 mb-5 pb-5">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center">
                        <div class="q-logo-wrap">
                            <img class="q-logo" src="<?= IMG; ?>/logo.png" alt="">
                        </div>
                        <div class="ml-md-3 text-center text-lg-start q-logo-text">
                            <h2>Уберем всё лишнее из ссылки!</h2>
                        </div>
                    </div>
                    <div class="text-center text-lg-start mt-3 mt-lg-0">
                        <ul>
                            <li class="d-inline-block"><a class="q-nav-link" href="<?= MAIN; ?>">Главная</a></li>
                            <li class="d-inline-block"><a class="q-nav-link" href="<?= ABOUT; ?>">Про нас</a></li>
                            <li class="d-inline-block"><a class="q-nav-link" href="<?= CONTACT; ?>">Контакты</a></li>
                            <?php if (isset($_COOKIE['logged'])): ?>
                                <li class="d-inline-block q-last-li"><a class="q-nav-link" href="<?= DASHBOARD; ?>">Личный кабинет</a></li>
                            <?php else: ?>
                                <li class="d-inline-block"><a class="q-nav-link" href="<?= USER_AUTH; ?>">Войти</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>