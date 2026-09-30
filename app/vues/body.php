<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $A_vue['title'] ?></title>
    </head>
    <body>
        <?php echo Vue::show('includes/header'); ?>
        <?php echo $A_vue['body'] ?>
    </body>
</html>