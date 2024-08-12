<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content customer default__dashboard">
    <?php
    $inputPlaceholder = 'Search by ID';
    $buttonContent = '
      <a id="customerAdd" class="add__button boton boton--inline boton--secundary">Add Customer</a>
      <a id="customerSearch" class="search__button boton boton--inline">Search Customer</a>
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