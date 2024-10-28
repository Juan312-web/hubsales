<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>
  <?php include_once __DIR__ . '/../components/alerts.php'; ?>



  <div class="content product__update content__center">
    <form method="POST" id="product__update" class="form">
      <h2 class="form__title">
        Update Product
      </h2>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="prod_name">Name</label>
          <input require autocomplete="name" name="prod_name" id="prod_name" type="text" class="form__input" placeholder="Ejm. coffe" value="<?php echo $data->prod_name ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="prod_code">Code</label>
          <input require name="prod_code" id="prod_code" type="number" class="form__input" placeholder="45863" value="<?php echo $data->prod_code ?>">
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="prod_cat_id">Categorie</label>
          <select name="prod_cat_id" id="prod_cat_id" class="form__input">
            <option selected disabled>-- Select a Categorie --</option>
            <?php foreach ($categories as $categorie): ?>
              <option <?php echo $data->prod_cat_id == $categorie->cat_id ? 'selected' : ''; ?> class="form__option" value="<?php echo $categorie->cat_id; ?>"><?php echo $categorie->cat_name; ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="prod_description">Description</label>
          <textarea require name="prod_description" id="prod_description" class="form__input desc" maxlength="60" placeholder="Ejm. Deliscious coffee"><?php echo $data->prod_description ?></textarea>
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="prod_u_price">Unit Price</label>
          <input require name="prod_u_price"
            placeholder="Ejm. $2000" id="prod_u_price" type="number" step="0.01" min="0.1" class="form__input" value="<?php echo $data->prod_u_price ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="prod_stock">Stock</label>
          <input require name="prod_stock"
            placeholder="Ejm. 23" id="prod_stock" type="number" class="form__input" value="<?php echo $data->prod_stock ?>">
        </div>
      </div>
      <input id="send" type="submit" class="boton" value="Update Product">
    </form>
  </div>
</div>