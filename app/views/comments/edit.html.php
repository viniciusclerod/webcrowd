    <nav>
        <ul>
            <li>
                <a href="/webcrowd/comments/index">Listar Comentários</a>
            </li>
            <li>
                <a href="/webcrowd/comments/show/<?php echo $comment->id ?>">Mostrar</a>
            </li>
        </ul>
    </nav>
    <section>
        <form action="/webcrowd/comments/edit/<?php echo $comment->id; ?>" method="post">
            <p>
                <label>Mensagem:</label>
                <textarea name="message" required><?php echo $comment->message; ?></textarea>
            </p>
            <p>
                <input type="submit" value="Alterar" />
            </p>
        </form>
    </section>