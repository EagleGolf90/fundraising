<?php
$target = 'target' . $section_number;
$target_label = 'target' . $section_number . '_label';
$index = intval($section_number) - 1;
$square_winner = 'square_winner' . $section_number;
$diamond_winner = 'diamond_winner' . $section_number;
$reverse_winner = 'reverse_winner' . $section_number;
$event_label = $labels[$index];
?>
            <div class="col-2 <?php echo $target; ?>">
              <label for="<?php echo $square_winner; ?>" class="form-label <?php echo $target_label; ?>"><?php echo $event_label; ?></label>
            </div>
            <div class="col-3 <?php echo $target; ?>">
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" name="<?php echo $square_winner; ?>" id="<?php echo $square_winner; ?>" class="form-control">
                <span class="input-group-text">.00</span>
              </div>
            </div>
            <div class="col-4 <?php echo $target; ?>">
              <div class="input-group">
                <input type="text" id="<?php echo $diamond_winner; ?>_qty" class="form-control text-center" disabled>
                <span class="input-group-text">x</span>
                <span class="input-group-text">$</span>
                <input type="text" name="<?php echo $diamond_winner; ?>" id="<?php echo $diamond_winner; ?>" class="form-control">
                <span class="input-group-text">.00</span>
              </div>
            </div>
            <div class="col-3 <?php echo $target; ?>">
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" name="<?php echo $reverse_winner; ?>" id="<?php echo $reverse_winner; ?>" class="form-control">
                <span class="input-group-text">.00</span>
              </div>
            </div>
