<?php
    // MAIN CONSTS
    const DEBUG = false;

    // TITLES
    const TITLE = "Сокра.тим";

    // FILES' ROUTES
    define(
        "PATH",
        preg_replace(
            "#[^/]+$#",
            '',
            "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"
        )
    );

    const CSS = '/public/css';
    const JS = '/public/js';
    const IMG = '/public/img';

    // LINKS` ROUTES
    const MAIN = '/';
    const ABOUT = '/we/about';
    const CONTACT = '/we/contact';
    const DASHBOARD = '/user';
    const USER_AUTH = '/user/auth';
    const USER_REG = '/user/reg';