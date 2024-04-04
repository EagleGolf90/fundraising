<?php
class Golfer {
  private $personID;
  private $firstName;
  private $lastName;

  public function __construct() {
    $this->personID = 1;
  }

  public function setFirstName($firstName) { $this->firstName = $firstName; }
  public function setLastName($lastName) { $this->lastName = $lastName; }

  public function message() {
    echo "Person ID = {$this->personID}, Name = {$this->firstName} {$this->lastName}<br/>";
  }
}
?>
