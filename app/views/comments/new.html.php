<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Novo Comentário</title>
    <link rel="stylesheet" href="/webcrowd/public/style/app.css"/>
</head>
<body>
<main>
    <header>
        <h1>Novo Comentário</h1>
    </header>
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
                <label>Nome:</label>
                <input type="text" name="username" required />
            </p>
            <p>
                <label>Mensagem:</label>
                <textarea name="message" required></textarea>
            </p>
            <p>
                <input type="submit" value="Comentar" />
            </p>
        </form>
    </section>
</main>
</body>
</html>