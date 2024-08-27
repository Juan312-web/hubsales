<?php $categories = $allCategories ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content categories default__dashboard">
    <?php
    $inputContent = '
        <input data-search="cat_id" data-id="search__categories" type="text" class="views__input"    placeholder="Search by Name">
      ';
    $buttonContent = '
      <a href="/categories-add" id="categorieAdd" class="add__button boton boton--inline boton--secundary">Add Categorie</a>
      <a id="categorieSearch" class="search__button boton boton--inline">Search Categorie</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>

    <div id="categories__table" class="categories__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Description</th>
        </thead>
        <tbody>
          <?php foreach ($categories as $categorie) : ?>
            <tr id="row" data-row="<?php echo $categorie->cat_id; ?>">
              <td data-label=' Name'><?php echo $categorie->cat_name ?></td>
              <td data-label='Description'><?php echo $categorie->cat_description ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>