<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Listagem de Comentários</title>
    <link rel="stylesheet" href="/webcrowd/public/style/app.css"/>
</head>
<body>
<main>
    <header>
        <h1>Listagem de Comentários</h1>
    </header>
    <nav>
        <ul>
            <li>
                <a href="/webcrowd/comments/index">Atualizar</a>
            </li>
            <li>
                <a href="/webcrowd/comments/create">Novo Comentário</a>
            </li>
        </ul>
    </nav>
    <section class="comments">
        <?php foreach($comments as $comment): ?>
            <article>
                <header>
                    <h1>
                        [<?php echo $comment->createdAt; ?>]
                        <?php echo $comment->username; ?> diz:
                    </h1>
                </header>
                <section>
                    <?php echo $comment->message; ?>
                </section>
                <?php //var_dump($comment); ?>
                <footer>
                    <ul>
                        <li>
                            <a href="/webcrowd/comments/show/<?php echo $comment->id; ?>">Mostrar</a>
                        </li>
                        <li>
                            <a href="/webcrowd/comments/delete/<?php echo $comment->id; ?>">Deletar</a>
                        </li>
                    </ul>
                </footer>
            </article>
        <?php endforeach; ?>
    </section>
</main>
</body>
</html>