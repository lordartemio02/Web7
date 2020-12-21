<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lab7/lab7.3/dop2/config/main.php";
require_once ENGINE_DIR . '/functions.php';
?>

<div class="upload_form_wrapper">
  <div class="upload_form">
    <h5>Upload your pictures to the gallery!</h5>
    <form action="" enctype="multipart/form-data" method="post">
      <input type="file" name="file[]" multiple>
      <input type="submit">
        <?php if (uploadFiles()) { ?>
          <ul>
              <?php foreach (uploadFiles() as $key => $value) {
                  for ($i = 0; $i <= count($value) - 1; $i++) {
                      if ($key == 'good') { ?>
                        <li><span class='upload_form__good'> <?= $value[$i] ?></span> is uploaded!</li>
                      <?php } elseif ($key == 'bad_type') { ?>
                        <li><span class='upload_form__bad'> <?= $value[$i] ?> </span> has unsupported file type! '</li>
                      <?php } else { ?>
                        <li><span class='upload_form__bad'> <?= $value[$i] ?></span> has size is bigger then 10Mb!</li>
                          <?php
                      }
                  }
              }
              ?>
          </ul>
        <?php } ?>

    </form>
  </div>
</div>
