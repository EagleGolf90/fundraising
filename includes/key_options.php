      <input type="hidden" name="bu" id="bu" value="<?php echo strtoupper($_GET['bu']); ?>" />
      <h1 class="text-center"><?php echo BUS_UNIT; ?> Squares</h1>
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
<?php
$rows = $squares->getEventNames();
foreach ($rows as $row) {
?>
            <option value="<?php echo $row['EventType']; ?>"><?php echo $row['EventName']; ?></option>
<?php
}
?>
          </select>
        </div>
        <div class="col-md-3">
          <label for="poolNumber" class="form-label">Pool Number</label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="poolNumber" id="poolNumber" required>
            <option selected>Choose one</option>
<?php
$rows = $squares->loadPoolNumbers();
foreach ($rows as $row) {
  $poolNumber = $row['PoolNbr'];
?>
            <option value="<?php echo $poolNumber; ?>"><?php echo $poolNumber; ?></option>
<?php
}
?>
          </select>
        </div>
      </div>
      <div class="row g-5">
        <div class="col-md-3">
          <button type="button" id="btnPayments" class="btn btn-primary">Get Payments</button>
        </div>
        <div class="col-md-3">
          <button type="button" id="btnParticipants" class="btn btn-primary">Get Participants</button>
        </div>
        <div class="col-md-3">
          <button type="button" id="btnPicks" class="btn btn-primary">Squares Picks</button>
        </div>
        <div class="col-md-3">
          &nbsp;
        </div>
      </div>
      <div class="row">
        &nbsp;
      </div>


