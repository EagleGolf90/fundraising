<?php
include('../preload.php');
include(HTML . 'beginHTML.php');
?>

<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Squares Setup</a></li>
    <li><a data-toggle="tab" href="#menu1">Instructions</a></li>
    <li><a data-toggle="tab" href="#menu2">Preview</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php include('setup_squares.php'); ?>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Instructions</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Preview</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
