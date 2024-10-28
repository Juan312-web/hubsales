<?php
$products = $allProducts;
$categories = $allCategories ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content products default__dashboard">
    <?php
    $inputContent = '
        <input data-search="prod_code" data-id="search__products" type="number" class="views__input"    placeholder="Search By Code">
      ';
    $buttonContent = '
      <a href="/products-add" id="productAdd" class="add__button boton boton--inline boton--secundary">Add Product</a>
      <a id="productSearch" class="search__button boton boton--inline">Search Product</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <a href="/categories" id="categoriesSearch" class="search__button boton boton--inline space">Categories</a>

    <div class="products__table">
      <table>
        <thead>
          <th>Code</th>
          <th>Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Categorie</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr id="row" data-row='<?php echo $product->prod_code; ?>'>
              <td data-label='Code'><?php echo $product->prod_code ?></td>
              <td data-label='Name'><?php echo $product->prod_name ?></td>
              <td data-label='Price'>$<?php echo $product->prod_u_price ?></td>
              <td data-label='Stock'><?php echo $product->prod_stock ?> Units</td>

              <?php foreach ($categories as $categorie):  ?>
                <?php if ($product->prod_cat_id === $categorie->cat_id):  ?>
                  <td data-label='Categorie'><?php echo $categorie->cat_name ?></td>
                <?php endif ?>
              <?php endforeach ?>
              <td class="action__container">
                <a class="boton--action update" href="/products-update?id=<?php echo $product->prod_id ?>"><span class="material-symbols-outlined">
                    edit
                  </span></a>
                <form action="/products-delete" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar <?php echo $product->prod_name ?>?')">
                  <input type="hidden" name="id" value="<?php echo $product->prod_id ?>">
                  <button type="submit" class="boton--action delete "><span class="material-symbols-outlined">
                      delete
                    </span></button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>