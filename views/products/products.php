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
    <div class="products__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
        </thead>
        <tbody>
          <tr>
            <td>Juan Carlos Real</td>
            <td>Admin</td>
            <td>correo@correo.com</td>
          </tr>
          <tr>
            <td>Juan Carlos Real</td>
            <td>Default</td>
            <td>correo@correo.com</td>
          </tr>
          <tr>
            <td>Juan Carlos Real</td>
            <td>Default</td>
            <td>correopersonal@correo.com</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>