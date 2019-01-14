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
    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        $array = [];
        $query = $this->db->query('SELECT * FROM trainee');
        $trainees = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($trainees as $trainee)
        {
            $tmp = new Trainee($trainee);
            $array[] = $tmp;
        }

        return $array;
    }

    public function findOne($id)
    {
        $id = (int)$id;

        $q = $this->db->query('SELECT * FROM trainee WHERE  id = ' . $id);
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return new Trainee($data);
    }

    public function add(Trainee $trainee)
    {

    }

    public function delete(Trainee $trainee)
    {

    }

    public function update(Trainee $trainee)
    {

    }
}