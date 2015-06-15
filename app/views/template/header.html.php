<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'WebCrowd'; ?></title>
    <link rel="stylesheet" href="/webcrowd/public/style/app.css"/>
</head>
<body>
<main>
    <?php if(isset($message)): ?>
    <section class="alert">
        <?php echo $message; ?>
    </section>
    <?php endif; ?>
    <header>

        <section class="right">
            <?php if(Auth::isLogged()): ?>
                <?php echo $_SESSION['user']->username; ?> |
                <a href="/webcrowd/users/logout">Sair</a>
            <? endif; ?>
        </section>

        <h1><a href="/webcrowd">WebCrowd</a></h1>
        <?php if(isset($title)): ?>
            <h2><?php echo $title; ?></h2>
        <? endif; ?>

    </header>
