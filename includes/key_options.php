      <input type="hidden" name="bu" id="bu" value="<?php echo strtoupper($_GET['bu']); ?>" />
      <h1 class="text-center">Squares Payments</h1>
      <div class="row g-5">
        <div class="col-md-3">
          <label for="yearPicked" class="form-label">Year Picked</label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="yearPicked" id="yearPicked" required>
            <option selected>Choose one</option>
<?php
$rows = $squares->getPaymentYears();
foreach ($rows as $row) {
  $yearPicked = $row['YearPick'];
            ?>
            <option value="<?php echo $yearPicked; ?>"><?php echo $yearPicked; ?></option>
<?php
}
?>
          </select>
        </div>
        <div class="col-md-3">
          <label for="eventType" class="form-label">Event Type</label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="eventType" id="eventType" required>
            <option selected>Choose one</option>
            <option value="1">NFL Super Bowl</option>
            <option value="2">NCAA March Madness</option>
            <option value="3">MLB World Series</option>
            <option value="4">NBA Championship</option>
            <option value="5">NCAA March Madness #2</option>
            <option value="6">PGA, The Masters</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="poolNumber" class="form-label">Pool Number</label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="poolNumber" id="poolNumber" required>
            <option selected>Choose one</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>
        <div class="col-md-3">
          <br/>
          <button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
        </div>
      </div>
