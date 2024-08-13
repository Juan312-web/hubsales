<?php $users = $allUsers ?>
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
          <th>ID</th>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?php echo $user->user_id ?></td>
              <td><?php echo $user->user_name . ' ' . $user->user_lastname ?></td>
              <td><?php echo $user->user_role === 1 ? 'Admin' : 'Normal' ?></td>
              <td><?php echo $user->user_email ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>