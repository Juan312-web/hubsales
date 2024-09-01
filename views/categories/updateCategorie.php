<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>
  <?php include_once __DIR__ . '/../components/alerts.php'; ?>



  <div class="content categorie__add content__center">
    <form method="POST" id="categorie__add" class="form">
      <h2 class="form__title">
        Update Categorie
      </h2>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cat_name">Name</label>
          <input require autocomplete="name" name="cat_name" id="cat_name" type="text" class="form__input" placeholder="Ejm. coffee" value="<?php echo $data->cat_name ?>">
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cat_description">Description</label>
          <textarea require name="cat_description" id="cat_description" class="form__input" maxlength="60" placeholder="Ejm. Deliscious coffee"><?php echo $data->cat_description ?></textarea>
        </div>
      </div>
      <input id="send" type="submit" class="boton" value="Update">
    </form>
  </div>
</div>