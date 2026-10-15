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
    ['POST', '/login', [LoginController::class, 'loginAction']],
    ['GET', '/register', [RegisterController::class, 'registerForm']],
    ['POST', '/register', [RegisterController::class, 'registerAction']],
    ['GET', '/forgottenpassword', [ForgottenpasswordController::class, 'forgottenpasswordForm']],
    ['POST', '/forgottenpassword', [ForgottenpasswordController::class, 'forgottenpasswordAction']],
    ['GET', '/sitemap', [SitemapController::class, 'sitemapForm']],
    ['GET', '/contact', [ContactController::class, 'contactForm']],
    ['GET', '/mentions', [MentionsController::class, 'mentionsForm']],
];