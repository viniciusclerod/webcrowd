    <nav>
        <ul>
            <li>
                <a href="/webcrowd/comments/index">Listar Comentários</a>
            </li>
        </ul>
    </nav>
    <section>
        <form action="/webcrowd/comments/create" method="post">
            <p>
                <label>Mensagem:</label>
                <textarea name="message" required></textarea>
            </p>
            <p>
                <input type="submit" value="Comentar" />
            </p>
        </form>
    </section>