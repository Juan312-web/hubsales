<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content users default__dashboard ">
    <?php
    $inputPlaceholder = 'Search by Email';
    $buttonContent = '
        <a id="userAdd" class="add__button boton boton--inline boton--secundary">Add User</a>
        <a id="userSearch" class="search__button boton boton--inline">Search User</a>
      ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>

    <div class="users__table">
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