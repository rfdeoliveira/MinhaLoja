<?php require_once('cabecalho.php') ?>

  <h1>Contato</h1>

  <form method="post" action="envia-contato.php">
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome"></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input class="form-control" type="text" name="email"></td>
        </tr>
        <tr>
            <td>Mensagem</td>
            <td><textarea class="form-control" name="mensagem"></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <button role="submit" class="btn btn-primary form-control">
                    Enviar
                </button>
            </td>
        </tr>
    </table>
  </form>

<?php require_once('rodape.php') ?>
