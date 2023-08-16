    <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
    <tr>
      <td class="ctr event" colspan="3">
        <table class="table table-bordered">
        <tr class="footer_instruction pendingTitle"><td>Pending</td></tr>
        <tr class="footer_instruction takenTitle"><td>Taken</td></tr>
        <tr class="footer_instruction selectTitle"><td>Selected</td></tr>
        </table>
      </td>
      <td class="ctr" colspan="2">
        <?php if ($showNames == 'N') { ?>
        <button id="submitForm" class="btn btn-primary btn-lg">Ready to buy Squares</button><br/>
        <h4><a href="https://kdga.org/fundraising/squares/?bu=kdga">Back to Instructions</a></h4>
        <?php } ?>
      </td>
      <td class="ctr event" colspan="9">
        <?php echo $squares->getInstructionsFooter(); ?>
      </td>
    </tr>
    </table>
