<?php
$products = $allProducts;
$categories = $allCategories ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content products default__dashboard">
    <?php
    $inputPlaceholder = 'Search by Code';
    $buttonContent = '
      <a id="productAdd" class="add__button boton boton--inline boton--secundary">Add Product</a>
      <a id="productSearch" class="search__button boton boton--inline">Search Product</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <a href="/categories" id="productSearch" class="search__button boton boton--inline space">Add Categorie</a>

    <div class="products__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Categorie</th>
          <th>Description</th>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td><?php echo $product->prod_name ?></td>
              <td><?php echo $product->prod_u_price ?></td>
              <td><?php echo $product->prod_stock ?></td>

              <?php foreach ($categories as $categorie):  ?>
                <?php if ($product->prod_cat_id === $categorie->cat_id):  ?>
                  <td><?php echo $categorie->cat_name ?></td>
                <?php endif ?>
              <?php endforeach ?>
              <td class="ellipsis"><?php echo $product->prod_description ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>