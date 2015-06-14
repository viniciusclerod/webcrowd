    <nav>
        <ul>
            <li>
                <a href="/webcrowd/users/signup">Cadastre-se</a>
            </li>
        </ul>
    </nav>
    <section class="col-50 offset-25">
        <form action="/webcrowd/users/login" method="post">
            <p>
                <label>Email:</label>
                <input type="email" name="email" required />
            </p>
            <p>
                <label>Senha:</label>
                <input type="password" name="password" required />
            </p>
            <p>
                <input type="submit" value="Entrar" />
            </p>
        </form>
    </section>