    <nav>
        <ul>
            <li>
                <a href="/webcrowd/users/login">Entrar</a>
            </li>
        </ul>
    </nav>
    <section class="col-50 offset-25">
        <form action="/webcrowd/users/signup" method="post">
            <p>
                <label>Nome:</label>
                <input type="text" name="username" required />
            </p>
            <p>
                <label>Email:</label>
                <input type="email" name="email" required />
            </p>
            <p>
                <label>Senha:</label>
                <input type="password" name="password" required />
            </p>
            <p>
                <input type="submit" value="Cadastrar" />
            </p>
        </form>
    </section>