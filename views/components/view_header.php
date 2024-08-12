<div class="views__header__container">
  <div class="views__header">
    <h1 class="views__title"><?php echo $title ?></h1>
    <p class="views__desc"><?php echo $desc ?></p>
  </div>
  <div class="views__actions">
    <div class="views__actions__buttons">
      <?php echo $buttonContent ?? ''; ?>
    </div>
  </div>
</div>
<div id="views__search" class="search">
  <input type="text" class="views__input" placeholder="<?php echo $inputPlaceholder ?>">
  <span class="material-symbols-outlined search__icon">
    search
  </span>
</div>