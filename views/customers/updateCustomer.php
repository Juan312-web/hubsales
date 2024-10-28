<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>
  <?php include_once __DIR__ . '/../components/alerts.php'; ?>



  <div class="content customer__update content__center">
    <form method="POST" id="customer__update" class="form">
      <h2 class="form__title">
        Update Customer
      </h2>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_name">Name</label>
          <input require autocomplete="name" name="cli_name" id="cli_name" type="text" class="form__input" placeholder="Ejm. Juan" value="<?php echo $data->cli_name ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_lastname">Lastname</label>
          <input require autocomplete="name" name="cli_lastname" id="cli_lastname" type="text" class="form__input" placeholder="Ejm. Juan" value="<?php echo $data->cli_lastname ?>">
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_identity">Identity</label>
          <input require name="cli_identity" id="cli_identity" class="form__input" maxlength="60" placeholder="Ejm. Gomez" value="<?php echo $data->cli_identity ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_address">Address</label>
          <input require name="cli_address" id="cli_address" class="form__input" placeholder="Cl 1 #1-1" value="<?php echo $data->cli_address ?>">
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_email">Email</label>
          <input require autocomplete="email" name="cli_email" id="cli_email" class="form__input" placeholder="Ejm. correo@correo.com" value="<?php echo $data->cli_email ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_phone">Phone</label>
          <input require name="cli_phone" id="cli_phone" class="form__input" placeholder="Ejm. 0123456789" value="<?php echo $data->cli_phone ?>">
        </div>
      </div>
      <input id="send" type="submit" class="boton" value="Update Customer">
    </form>
  </div>
</div>