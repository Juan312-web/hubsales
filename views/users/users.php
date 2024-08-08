<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content users">
    <div class="users__header">
      <h1 class="users__title"><?php echo $title ?></h1>
      <p class="users__desc">Manage your users</p>
    </div>
    <div class="users__actions">
      <div class="users__actions__buttons">
        <a class="users__add boton boton--inline boton--secundary">Agregar Usuario</a>
        <a class="users__search boton boton--inline">Buscar Usuario</a>
      </div>
      <div class="search">
        <input type="text" class="users__input search">
        <span class="material-symbols-outlined search__icon">
          search
        </span>
      </div>
    </div>
    <div class="users__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
        </thead>
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
      </table>
    </div>
  </div>
</div>