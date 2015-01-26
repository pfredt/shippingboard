<<<<<<< HEAD
<div id="info-box_<?= $attribute ?>">
  <hr>
  <?php if ($list) foreach ($list as $key => $count) { ?>
    <div class="form-item item_<?= $key; ?>">
      <div class="well well-sm">
        <?= $data[$key] ?>&nbsp;<strong>(<?= $count ?>)</strong>
        <?php for ($i = 0; $i < $count; $i++) { ?>
          <input type="hidden" name="<?= explode("\\", $model->className())[2]; ?>[<?= $attribute ?>][]" value="<?= $key ?>">
        <?php } ?>
      </div>
      <hr>
    </div>
  <?php } ?>
</div>

<script type="text/html" id="tmpl_<?= $attribute ?>">
  <div class="form-item item_<%= value %>">
    <div class="well well-sm">
      <%= name %>&nbsp;<strong>(1)</strong>
      <input type="hidden" name="<?= explode("\\", $model->className())[2]; ?>[<?= $attribute ?>][]" value="<%= value %>">
    </div>
    <hr>
  </div>
</script>


<script>
  $(document).ready(function () {
    $("#select_<?= $attribute ?>").change(function () {
      var val = $(this).val();
      var name = $(this).find("option[value='" + val + "']").text();

      $(this).val('');

      var box = $("#info-box_<?= $attribute ?>").find(".item_" + val);
      if (box.length) {
        var inputs = box.find('input');
        inputs.eq(0).clone().appendTo(box.find('.well-sm'));

        box.find('strong').text("(" + (inputs.length + 1) + ")");

        return;
      }

      var data = {
        name: name,
        value: val
      };
      var text = tmpl("tmpl_<?= $attribute ?>", data);
      $("#info-box_<?= $attribute ?>").append(text);
    });
    $("#info-box_<?= $attribute ?>").on('click', '.form-item', function () {
      var el = $(this), inputs = el.find('input');
      console.log(inputs);
      if (inputs.length > 1) {
        inputs[0].remove();
        el.find('strong').text("(" + (inputs.length - 1) + ")");
      } else
        $(this).remove();
    });
  });
</script>

<style>
  .form-item:hover .well {
    background: #ffffff;
    cursor: pointer;
  }
=======
<div id="info-box_<?= $attribute ?>">
  <hr>
  <?php if ($list) foreach ($list as $key => $count) { ?>
    <div class="form-item item_<?= $key; ?>">
      <div class="well well-sm">
        <?= $data[$key] ?>&nbsp;<strong>(<?= $count ?>)</strong>
        <?php for ($i = 0; $i < $count; $i++) { ?>
          <input type="hidden" name="<?= explode("\\", $model->className())[2]; ?>[<?= $attribute ?>][]" value="<?= $key ?>">
        <?php } ?>
      </div>
      <hr>
    </div>
  <?php } ?>
</div>

<script type="text/html" id="tmpl_<?= $attribute ?>">
  <div class="form-item item_<%= value %>">
    <div class="well well-sm">
      <%= name %>&nbsp;<strong>(1)</strong>
      <input type="hidden" name="<?= explode("\\", $model->className())[2]; ?>[<?= $attribute ?>][]" value="<%= value %>">
    </div>
    <hr>
  </div>
</script>


<script>
  $(document).ready(function () {
    $("#select_<?= $attribute ?>").change(function () {
      var val = $(this).val();
      var name = $(this).find("option[value='" + val + "']").text();

      $(this).val('');

      var box = $("#info-box_<?= $attribute ?>").find(".item_" + val);
      if (box.length) {
        var inputs = box.find('input');
        inputs.eq(0).clone().appendTo(box.find('.well-sm'));

        box.find('strong').text("(" + (inputs.length + 1) + ")");

        return;
      }

      var data = {
        name: name,
        value: val
      };
      var text = tmpl("tmpl_<?= $attribute ?>", data);
      $("#info-box_<?= $attribute ?>").append(text);
    });
    $("#info-box_<?= $attribute ?>").on('click', '.form-item', function () {
      var el = $(this), inputs = el.find('input');
      console.log(inputs);
      if (inputs.length > 1) {
        inputs[0].remove();
        el.find('strong').text("(" + (inputs.length - 1) + ")");
      } else
        $(this).remove();
    });
  });
</script>

<style>
  .form-item:hover .well {
    background: #ffffff;
    cursor: pointer;
  }
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
</style>