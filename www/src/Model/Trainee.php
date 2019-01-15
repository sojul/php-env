<?php

namespace CleverAge\Formation\Model;

use DateTime;

/**
 * Mon commentaire
 *
 */
class Trainee
{

  CONST MAX_LENGTH = 45;

  /**
   * @var int id
   */
  protected $id;

  /**
   * @var string
   */
  protected $firstName;


  /**
   * @var string
   */
  protected $lastName;

  /**
   * @var int
   */
  protected $age;

  /**
   * @var DateTime
   */
  protected $dateOfBirth;

  /**
   * Trainee constructor.
   * @param $id int
   * @param $firstName
   * @param $lastName
   * @param DateTime $dateOfBirth
   * @throws Exception
   * @throws FistNameException
   */
  public function __construct($id, $firstName, $lastName, string $dateOfBirth = null) {
    $this->id = $id;
    $this->setFirstName($firstName);
    $this->setLastName($lastName);
    $this->setDateOfBirth($dateOfBirth);
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getFirstName(): string {
    return $this->firstName;
  }

  /**
   * @param string $firstName
   * @throws FistNameException
   */
  public function setFirstName(string $firstName): void {
    if ($this->checkLength($firstName)) {
      $this->firstName = $firstName;
    }
    else {
      //            throw new FistNameException();
    }
  }

  /**
   * @return string
   */
  public function getLastName(): string {
    return $this->lastName;
  }

  /**
   * @param string $lastName
   * @throws Exception
   */
  public function setLastName(string $lastName): void {
    if ($this->checkLength($lastName) == true) {
      $this->lastName = $lastName;
    }
    else {
      // throw new Exception('ERREUR: le parametre est trop grand');
    }
  }

  /**
   * @return int
   */
  public function getAge(): int {
    return $this->age;
  }

  /**
   * @return DateTime
   */
  public function getDateOfBirth(): DateTime {
    return $this->dateOfBirth;
  }

  /**
   * @param string $dateOfBirth
   */
  public function setDateOfBirth($dateOfBirth) {
    if (empty($dateOfBirth)) {
      $this->dateOfBirth = null;
      $this->age = null;
    }
    else {
      $dateOfBirth = DateTime::createFromFormat('Y-m-d', $dateOfBirth);
      if ($dateOfBirth > new DateTime()) {
        echo 'erreur';
      }
      else {
        $this->dateOfBirth = $dateOfBirth;
        $this->age = $this->calculeAge($this->dateOfBirth);
      }
    }
  }


  private function checkLength($string, $maxLength = self::MAX_LENGTH) {
    return strlen($string) < $maxLength;
  }


  /**
   * @param DateTime $dateOfBirth
   * @return string
   */
  private function calculeAge(DateTime $dateOfBirth): string {
    $now = (new DateTime())->format('Y');
    return $now - $dateOfBirth->format('Y');
  }
}
