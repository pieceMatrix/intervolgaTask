<?php 
require_once("logic.php")
require_once();
<div class="row ">
                <div class="col-6 ">
                    <h1 class="d-inline">Радио телефон Panasonic</h1>
                    <span class="feature d-inline-block ml-2 my-4">Объявление снято с продажи.</span>
                </div>- типа того
 <div class="form-group">
<input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">

  выбор студента              
                <select name="ads" class="form-control">
                <option value selected>Выберите тип объявления</option>
                <?php foreach($result2 as $types): ?> 
                 <!-- <option value=" $types['id'] ?>"><$types['name_ads'] ?></option> -->
                 <option <?=isset( $_GET['ads']) && $_GET['ads'] == $types['id'] ? 'selected' : ''?> value="<?= htmlspecialchars($types['id']) ?>">
                 <?=htmlspecialchars($types['name_ads'])?></option>
                 <?php endforeach; ?>
             </select>
