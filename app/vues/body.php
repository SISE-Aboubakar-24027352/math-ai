<?php
function start_page($title): void {
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="utf-8" content="text/html" http-equiv="Content-Type">
        <title><?php echo $title; ?></title>
    </head>
    <body>
    <?php Vue::montrer('standard/header'); ?>
    <?php echo $A_vue['body'] ?>
    <?php Vue::montrer('standard/footer'); ?>
    </body>
</html>
<?php
}
start_page("Accueil");