<?php
return [
    ['GET', '/', [HomeController::class, 'homeForm']],
    ['GET', '/', [HomeController::class, 'loginForm']],
    ['POST', '/', [HomeController::class, 'login']],
    ['GET', '/', [HomeController::class, 'registerForm']],
    ['POST', '/', [HomeController::class, 'register']],
    ['GET', '/', [HomeController::class, 'forgottenPasswordForm']],
    ['POST', '/', [HomeController::class, 'forgottenPassword']],
    ['GET', '/', [HomeController::class, 'siteMapForm']],
    ['GET', '/', [HomeController::class, 'contactForm']],
    ['GET', '/', [HomeController::class, 'mentionsForm']],
];