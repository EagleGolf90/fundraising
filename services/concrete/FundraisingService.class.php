<?php
interface IFundraisingService
{
    public function printTitle($title);
    public function printHeader($rows);
    public function printSquares($rowCount);
    public function printFooter();
}

class FundraisingService implements IFundraisingService
{
    private $sqlTable;
    private $drawLabels;
    private $legendLabels = ['Pending', 'Taken', 'Selected'];
    private $nflLabels = ['Final', 'Third', 'Second', 'First'];
    private $ncaaLabels = ['Winning', 'Losing'];

    public function __construct(SQLTable $sqlTable, $eventType) {
        $this->sqlTable = $sqlTable;
        $this->drawLabels = $this->determineEventType($eventType);
    }

    private function determineEventType($eventType) {
        return ($eventType == 'nfl') ? $this->nflLabels : $this->ncaaLabels;
    }

    public function printTitle($title)
    {
        echo '<h1 style="text-align: center; margin-top: 20px;">' . htmlspecialchars($title) . '</h1>' . "\n";
    }

    private function printTable()
    {
        echo '<table class="table table-bordered" style="width:100%; margin: 20px auto; text-align: center;">' . "\n";
    }

    private function printCell($value, $class)
    {
        echo '<td' . ($class != '' ? ' class="' . $class . '"': '') . '>' . $value . '</td>';
    }

    private function printBeginCellRow()
    {
        echo "<tr>";
    }

    private function printBlankCell($rowcount)
    {
        for ($c = 0; $c < $rowcount; $c++) {
           echo '<td>' . $this->drawLabels[$c] . '</td>';
        }
    }

    public function printHeader($rows)
    {
        $this->printTable();

        for ($a = 1; $a <= $rows; $a++) {
            $this->printBeginCellRow();
            if ($rows == $a) {
              $this->printBlankCell($rows-1);
            } else {
              echo '<td colspan="' . ($rows-1) . '">&nbsp;</td>';
            }
            $this->printCell($this->drawLabels[$a-1], 'tableHeader');
            for ($b = 1; $b <= 10; $b++) {
                $this->printCell('&nbsp;', 'tableHeader');
            }
            $this->printEndCellRow();
        }
    }

    private function printRowCell($boxNumber)
    {
        for ($column = 1; $column <= 10; $column++) {
            $this->printCell($boxNumber, '');
            $boxNumber++;
        }
        return $boxNumber;
    }

    public function printSquares($rowCount)
    {
        $cell = 1;
        for ($row = 1; $row <= 10; $row++) {
            $this->printBeginCellRow();
            for ($column = $rowCount; $column >= 1; $column--) {
              $this->printCell($drawLabels[$column-1], 'tableHeader');
            }
            $cell = $this->printRowCell($cell);
            $this->printEndCellRow();
        }
    }

    private function printEndCellRow()
    {
        echo "</tr>\n";
    }

    public function printFooter()
    {
        echo '</table>' . "\n";
    }

}
?>
