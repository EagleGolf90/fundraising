<?php
if (!isset($_GET['bu'])) die('Must have bu parameter. Please try again.');

include('../preload.php');
include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Squares Details</a></li>
    <li><a href="#tabs-2">Instructions</a></li>
    <li><a href="#tabs-3">Preview</a></li>
  </ul>
  <div id="tabs-1">
    <div class="container-xl">
      <main>
        <div class="row g-9 text-center">
          <div class="py-2 text-center">
            <h2>KDGA Setup Form</h2>
          </div>

          <div class="col-md-7 col-lg-8">
            <form class="areaForm" action="update_setup.php" method="post">
              <input type="text" name="bu" id="bu" value="<?php echo strtoupper($_GET['bu']); ?>" hidden>
              <div class="row g-2">
                <?php include('setup_header.php'); ?>
                <hr>
                <?php
                include('squares_header.php');
                include('pick_labels.php');

                for ($section_number = 1; $section_number <= 4; $section_number++) {
                  include('squares_form_details.php');
                }

                include('reverse_winner_section.php');
                ?>

                <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitForm" type="submit">Submit</button></div>
                <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="21" id="clearAll" type="button">Clear All</button></div>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
