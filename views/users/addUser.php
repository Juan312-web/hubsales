<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content user__add">
    <form id="user__add" class="form">
      <h2 class="form__title">
        Add User
      </h2>
      <div class="form__row">
        <div class="form__row__item">
          <label class="form__label" for="name">Name</label>
          <input name="name" id="name" type="text" class="form__input" placeholder="Ejm. Jhon">
        </div>
        <div class="form__row__item">
          <label class="form__label" for="lastname">Lastname</label>
          <input name="lastname" id="lastname" type="text" class="form__input" placeholder="Ejm. Cena">
        </div>
      </div>
      <div class="form__row">
        <div class="form__row__item">
          <label class="form__label" for="role">Role</label>
          <input name="role" id="role" type="text" class="form__input" placeholder="-- Select a Role --">
        </div>
        <div class="form__row__item">
          <label class="form__label" for="password">Password</label>
          <input name="password" id="password" type="password" class="form__input">
        </div>
      </div>
      <div class="form__row">
        <div class="form__row__item">
          <label class="form__label" for="email">Email</label>
          <input name="email" id="email" type="email" class="form__input" placeholder="Ejm. correo@correo.com">
        </div>
      </div>
      <input type="submit" class="boton" value="Add User">
    </form>
  </div>
</div>