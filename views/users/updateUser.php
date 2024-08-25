<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>
  <?php include_once __DIR__ . '/../components/alerts.php'; ?>



  <div class="content user__add">
    <form method="POST" id="user__add" class="form">
      <h2 class="form__title">
        Update User
      </h2>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="user_name">Name</label>
          <input require autocomplete="name" name="user_name" id="user_name" type="text" class="form__input" placeholder="Ejm. Jhon" value="<?php echo $data->user_name ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="user_lastname">Lastname</label>
          <input require autocomplete="family-name" name="user_lastname" id="user_lastname" type="text" class="form__input" placeholder="Ejm. Cena" value="<?php echo $data->user_lastname ?>">
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="user_role">Role</label>
          <select name="user_role" id="user_role" class="form__input">
            <?php foreach ($roles as $role): ?>
              <option <?php echo $data->user_role == $role->role_id ? 'selected' : ''; ?> class="form__option" value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="user_password">Password</label>
          <input require autocomplete="current-password" name="user_password" id="user_password" type="password" class="form__input">
        </div>
      </div>
      <div class="form__row">
        <div class="form__row__item">
          <label class="form__label" for="user_email">Email</label>
          <input require autocomplete="email" name="user_email" id="user_email" type="email" class="form__input" placeholder="Ejm. correo@correo.com" value="<?php echo $data->user_email ?>">
        </div>
      </div>
      <input id="send" type="submit" class="boton" value="Update">
    </form>
  </div>
</div>