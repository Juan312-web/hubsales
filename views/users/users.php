<?php $users = $allUsers; ?>
<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content users default__dashboard ">
    <?php
    $inputContent = '
        <input data-search="user_id" data-id="search__users" type="search" class="views__input"    placeholder="Search By Email">
      ';
    $buttonContent = '
        <a href="/users-add" id="userAdd" class="add__button boton boton--inline boton--secundary">Add User</a>
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
          <th>Actions</th>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr id="row" data-row='<?php echo $user->user_id; ?>'>
              <td data-label='ID'><?php echo $user->user_id; ?></td>
              <td data-label='Name'><?php echo $user->user_name . ' ' . $user->user_lastname; ?></td>
              <td data-label='Role'><?php echo $user->user_role === 1 ? 'Admin' : 'Normal'; ?></td>
              <td data-label='Email'><?php echo $user->user_email; ?></td>

              <td class="action__container">
                <a class="boton--action update" href="/users-update?id=<?php echo $user->user_id ?>"><span class="material-symbols-outlined">
                    edit
                  </span></a>
                <form action="/users-delete" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">
                  <input type="hidden" name="id" value="<?php echo $user->user_id ?>">
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