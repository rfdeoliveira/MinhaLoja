<?php include('logica-usuario.php') ?>
<?php include("cabecalho.php") ?>

  <h1>Minha loja</h1>
    <?php if (usuarioEstaLogado()) : ?>
      <p class="text-success">
        Você está logado como <?= usuarioLogado() ?>
      </p>
    <?php else : ?>
      <h2>Login</h2>
      <form action="login.php" method="post">
        <table class="table">
          <tr>
            <td>E-mail</td>
            <td>
              <input type="email" class="form-control" name="email">
            </td>
          </tr>
          <tr>
            <td>Senha</td>
            <td>
              <input type="password" class="form-control" name="senha">
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit" class="btn btn-primary">
                Login
              </button>
            </td>
          </tr>
        </table>
      </form>
    <?php endif ?>
<?php include("rodape.php"); ?>
