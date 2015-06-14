    <nav>
        <ul>
            <li>
                <a href="/webcrowd/comments/index">Listar Comentários</a>
            </li>
            <li>
                <a href="/webcrowd/comments/edit/<?php echo $comment->id ?>">Editar</a>
            </li>
            <li>
                <a href="/webcrowd/comments/delete/<?php echo $comment->id ?>">Deletar</a>
            </li>
        </ul>
    </nav>
    <section class="comments">
        <article>
            <header>
                <h1>
                    Descrição
                </h1>
            </header>
            <section>
                <p>
                    <strong>ID:</strong> <?php echo $comment->id; ?>
                </p>
                <p>
                    <strong>Nome:</strong> <?php echo $comment->username; ?>
                </p>
                <p>
                    <strong>Mensagem:</strong> <?php echo $comment->message; ?>
                </p>
                <p>
                    <strong>Data de Criação:</strong> <?php echo $comment->createdAt; ?>
                </p>
                <p>
                    <strong>Data de Alteração:</strong> <?php echo $comment->updatedAt; ?>
                </p>
            </section>
        </article>
    </section>