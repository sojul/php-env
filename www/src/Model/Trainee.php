<?php

namespace CleverAge\Formation\Model;

use CleverAge\Formation\Exception\FistNameException;
use DateTime;

/**
 * Mon commentaire
 *
 */
class Trainee extends Entity
{

    CONST MAX_LENGTH = 45;

    /**
     * @var int id
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;


    /**
     * @var string
     */
    private $lastName;

    /**
     * @var int
     */
    private $age;

    /**
     * @var DateTime
     */
    private $dateOfBirth;



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        if ($this->checkLengh($firstName)) {
            $this->firstName = $firstName;
        } else {
//            throw new FistNameException();
        }
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    public function setLastName(string $lastName): void
    {
        if ($this->checkLengh($lastName) == true) {
            $this->lastName = $lastName;
        } else {
//            throw new Exception('ERREUR: le parametre est trop grand');
        }
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     */
    public function setDateOfBirth(string $dateOfBirth = null)
    {
        if(empty($dateOfBirth)) {
            $this->dateOfBirth = null;
            $this->age = null;
        } else {
            $dateOfBirth = DateTime::createFromFormat('Y-m-d', $dateOfBirth);
            if ($dateOfBirth > new DateTime()) {
                echo 'erreur';
            } else {
                $this->dateOfBirth = $dateOfBirth;
                $this->age = $this->calculeAge($this->dateOfBirth);
            }
        }
    }

    private function checkLengh($string, $maxLength = self::MAX_LENGTH)
    {
        return strlen($string) <= $maxLength;
    }

    /**
     * @param DateTime $dateOfBirth
     * @return string
     */
    private function calculeAge(DateTime $dateOfBirth): string
    {
        $now = (new DateTime())->format('Y');
        return $now - $dateOfBirth->format('Y');
    }

    public function __toString()
    {
        $str = "Je suis $this->firstName $this->lastName";
        if(!empty($this->dateOfBirth))
        {
            $date = $this->dateOfBirth->format('d/m/Y');
            $str += ", je suis né(e) le $date";
        }
        return $str . '<br>';
    }


}