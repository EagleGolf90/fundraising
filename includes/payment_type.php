<?php
$bus_unit = strtolower($_GET['bu']);
$yearPick = $_GET['yr'];
$eventType = $_GET['event'];
$poolNumber = $_GET['pool'];
$personID = $_GET['id'];

$sqlTable = new SQLTable();
$rows = $sqlTable->load('checkPaymentTypes', array(strtolower($_GET['bu']), $_GET['yr'], $_GET['event'], $_GET['pool'], $_GET['id']));
foreach ($rows as $row) {
  $paymentTypes = $row['PaymentType'];
  $paymentUserName = $row['UserName'];
}
?>
      <div class="section"><span>2</span>Payment Type</div>
      <div class="inner-wrap">
        <label>
           <select name="paymentType" id="paymentType" class="form-select">
             <option value="" <?php echo $paymentTypes == 0 ? 'selected' : ''; ?> disabled>Select Payment Type</option>
             <option value="1" <?php echo $paymentTypes == 1 ? 'selected' : ''; ?>>CashApp</option>
             <option value="2" <?php echo $paymentTypes == 2 ? 'selected' : ''; ?>>Zelle</option>
             <option value="3" <?php echo $paymentTypes == 3 ? 'selected' : ''; ?>>Cash</option>
             <option value="4" <?php echo $paymentTypes == 4 ? 'selected' : ''; ?>>Check</option>
           </select>
        </label>
      </div>

      <div class="section"><span>3</span>Payment UserName</div>
      <div class="inner-wrap">
        <label><input type="text" name="userName" id="userName" class="form-control" placeholder="User Name" value="<?php echo htmlspecialchars($paymentUserName); ?>"/></label>
      </div>
