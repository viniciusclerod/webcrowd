<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Novo Comentário</title>
</head>
<body>
    <header>
        <h1>Novo Comentário</h1>
    </header>
    <section>
        <form action="/webcrowd/comments/create" method="post">
            <p>
                <label>Nome:</label>
                <input type="text" name="username" />
            </p>
            <p>
                <label>Mensagem:</label>
                <textarea name="message" cols="30" rows="10"></textarea>
            </p>
            <p>
                <input type="submit" value="Comentar" />
            </p>
        </form>
    </section>
</body>
</html>