<?php

use actions\Controller\{HomeController,
    LoginController,
    RegisterController,
    ForgottenpasswordController,
    ContactController,
    MentionsController,
    SitemapController};

return [
    ['GET', '/', [HomeController::class, 'homeForm']],
    ['GET', '/login', [LoginController::class, 'loginForm']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['GET', '/register', [RegisterController::class, 'registerForm']],
    ['POST', '/register', [RegisterController::class, 'register']],
    ['GET', '/forgottenpassword', [ForgottenpasswordController::class, 'forgottenpasswordForm']],
    ['POST', '/forgottenpassword', [ForgottenPasswordController::class, 'forgottenpassword']],
    ['GET', '/sitemap', [SiteMapController::class, 'sitemapForm']],
    ['GET', '/contact', [ContactController::class, 'contactForm']],
    ['GET', '/mentions', [MentionsController::class, 'mentionsForm']],
];