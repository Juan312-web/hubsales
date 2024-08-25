<?php $categories = $allCategories ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content categories default__dashboard">
    <?php
    $inputPlaceholder = 'Search by Name';
    $buttonContent = '
      <a id="categoriesAdd" class="add__button boton boton--inline boton--secundary">Add Categorie</a>
      <a id="categoriesSearch" class="search__button boton boton--inline">Search Categorie</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>

    <div id="categoires__table" class="categoires__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Description</th>
        </thead>
        <tbody>
          <?php foreach ($categories as $categorie) : ?>
            <tr>
              <td><?php echo $categorie->cat_name ?></td>
              <td><?php echo $categorie->cat_description ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>