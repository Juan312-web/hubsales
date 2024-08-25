<div id="alertContainer" class="contenedor-alertas alertas">
  <?php
  foreach ($alertas as $key => $mensajes) :
    foreach ($mensajes as $mensaje) :

  ?>
      <div id="alertas__container" class="alertas__container <?php echo $key; ?>">
        <?php if ($key !== 'error'): ?>
          <span class="material-symbols-outlined alertas__icon">
            check
          </span>
        <?php endif ?>
        <?php if ($key !== 'exito'): ?>
          <span class="material-symbols-outlined alertas__icon">
            error
          </span>
        <?php endif ?>
        <p class="alertas__message">
          <?php echo $mensaje; ?>
        </p>
      </div>
  <?php
    endforeach;
  endforeach;
  ?>
</div>

<script>
  setTimeout(() => {
    let alertsContainer = document.getElementById('alertContainer');
    if (alertsContainer) {
      alertsContainer.innerHTML = '';
    }
  }, 3500);
</script>