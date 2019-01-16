<?php
/**
 *
 */

namespace CleverAge\Formation\Repository;

use CleverAge\Formation\Model\Trainee;
use CleverAge\Formation\Utils\Database\DatabaseConnection;
use DateTime;
use PDO;

class TraineeRepository
{
  /**
   * @var DatabaseConnection $db
   */
  private $db;

  /**
   * TraineeManager constructor.
   * @param DatabaseConnection $db
   */
  public function __construct(DatabaseConnection $db) {
    $this->db = $db;
  }


  /**
   * @return array
   */
  public function findAll(): array {
    $array = [];
    $query = $this->db->query('SELECT * FROM trainee');
    $trainees = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($trainees as $index => $trainee) {
      // @TODO: Refactor Trainee use.
      $tmp = new Trainee($trainee);
      $array[] = $tmp;
    }

    return $array;
  }

  /**
   * @param $id
   * @return bool|Trainee
   */
  public function findOne($id) {
    $id = (int)$id;

    $q = $this->db->query('SELECT * FROM trainee WHERE  id = ' . $id);
    $data = $q->fetch(PDO::FETCH_ASSOC);

    return !empty($data) ? new Trainee($data) : FALSE;
  }

  /**
   * @param Trainee $trainee
   */
  public function add(Trainee $trainee) {
    $statement = $this->db->prepare('
      INSERT INTO trainee
      SET first_name = :first_name,
          last_name = :last_name,
          age = :age,
          date_of_birth = :date_of_birth
    ');
    $statement->execute([
      ':first_name' => $trainee->getFirstName(),
      ':last_name' => $trainee->getLastName(),
      ':age' => $trainee->getAge(),
      ':date_of_birth' => $trainee->getDateOfBirth()->format('Y-m-d'),
    ]);

    $trainee->setId($this->db->lastInsertId());
  }

  /**
   * @param Trainee $trainee
   */
  public function delete(Trainee $trainee) {
    $statement = $this->db->prepare('
      DELETE FROM trainee
      WHERE id = :id
    ');
    $statement->execute([
      ':id' => $trainee->getId(),
    ]);
  }

  /**
   * @param Trainee $trainee
   */
  public function update(Trainee $trainee) {
    $statement = $this->db->prepare('
      UPDATE trainee
      SET first_name = :first_name,
          last_name = :last_name,
          age = :age,
          date_of_birth = :date_of_birth
      WHERE id = :id
    ');
    $statement->execute([
      ':first_name' => $trainee->getFirstName(),
      ':last_name' => $trainee->getLastName(),
      ':age' => $trainee->getAge(),
      ':date_of_birth' => $trainee->getFormattedDateOfBirth(),
      ':id' => $trainee->getId(),
    ]);
  }
}
