    <nav>
        <ul>
            <li>
                <a href="/webcrowd/comments/create">Novo Comentário</a>
            </li>
        </ul>
    </nav>
    <section class="comments">
        <?php if($comments): ?>
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
                    </ul>
                </footer>
            </article>
        <?php endforeach; ?>
        <?php else: ?>
            <article>
                <header class="text-center">
                    Não existem comentários no momento.
                </header>
            </article>
        <?php endif; ?>
    </section>
