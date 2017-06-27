<tr>
  <td>Nome</td>
  <td><input class="form-control" type="text" name="nome" value="<?= $produto->nome ?>"></td>
</tr>
<tr>
  <td>Preço</td>
  <td><input class="form-control" type="number" name="preco" value="<?= $produto->preco ?>"></td>
</tr>
<tr>
  <td>Descrição</td>
  <td><textarea class="form-control" name="descricao"><?= $produto->descricao ?></textarea></td>
</tr>
<tr>
  <td></td>
  <td>
    <input type="checkbox" name="usado" value="true" <?= ($produto->usado) ? 'checked' : '' ?>> Usado
  </td>
</tr>
<tr>
  <td>Categoria</td>
  <td>
    <select class="form-control" name="categoria_id">
    <?php foreach ($categorias as $categoria) : ?>
        <?php $selecao = '' ?>
        <?php if ($produto->categoria->id == $categoria->id) : ?>
            <?php $selecao = 'selected="selected"' ?>
        <?php endif ?>
      <option value="<?= $categoria->id ?>" <?= $selecao ?>>
        <?= $categoria->nome ?>
      </option>
    <?php endforeach ?>
    </select>
  </td>
</tr>
