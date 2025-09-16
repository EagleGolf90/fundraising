<?php
class Fundraising {
    private $fundraisingService;

    public function __construct(IFundraisingService $fundraisingService) {
        $this->fundraisingService = $fundraisingService;
    }

    public function printTitle($title) {
        return $this->fundraisingService->printTitle($title);
    }

    public function printHeader($rows) {
        return $this->fundraisingService->printHeader($rows);
    }

    public function printSquares($rowCount) {
        return $this->fundraisingService->printSquares($rowCount);
    }

    public function printFooter() {
        return $this->fundraisingService->printFooter();
    }

}
?>
