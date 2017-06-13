<?php include('logica-usuario.php') ?>
<?php include("cabecalho.php") ?>

<?php if (isset($_GET['login']) && $_GET['login']==true) : ?>
    <p class="alert-success">Logado com sucesso</p>
<?php endif ?>

<?php if (isset($_GET['login']) && $_GET['login']==false) : ?>
    <p class="alert-danger">Usuário ou senha inválida!</p>
<?php endif ?>

<?php if (isset($_GET['falhaDeSeguranca']) && $_GET['falhaDeSeguranca']==true) : ?>
    <p class="alert-danger">Você não tem acesso a esta funcionalidade!</p>
<?php endif ?>

<?php if (isset($_GET['logout']) && $_GET['logout']==true) : ?>
    <p class="alert-success">Logout efetuado com sucesso</p>
<?php endif ?>

  <h1>Loja do Ronaldo</h1>
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
