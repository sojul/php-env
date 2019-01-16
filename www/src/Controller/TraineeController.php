<?php
namespace CleverAge\Formation\Controller;

use CleverAge\Formation\Model\Trainee;
use CleverAge\Formation\Repository\TraineeRepository;

/**
 * Controller for trainees related stuff.
 *
 * @package CleverAge\Formation\Controller
 */
class TraineeController extends ControllerBase {

  /**
   * List all trainees.
   */
  public function list() {
    $trainee_repository = new TraineeRepository($this->db);
    $trainees = $trainee_repository->findAll();

    return $this->engine->render('trainee-list.html.php', [
      'trainees' => $trainees
    ]);
  }

  /**
   * Display form and add a new Trainee
   */
  public function add() {

    // Handle form data if it has been submitted.
    if (!empty($_POST)) {
      if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['date_of_birth'])) {
        $trainee = new Trainee([
          'first_name' => $_POST['first_name'],
          'last_name' => $_POST['last_name'],
          'date_of_birth' => $_POST['date_of_birth'],
        ]);

        $trainee_repository = new TraineeRepository($this->db);
        $trainee_repository->add($trainee);

        $this->message_bag->addMessage("Le stagiaire #{$trainee->getId()} a été créé");

        $this->redirectTo('/trainee/list');
      }
    }

    return $this->engine->render('trainee-add.html.php');
  }

  /**
   * Display form to update a user.
   */
  public function update() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      return "Erreur: l'élément à modifier n'est pas valide";
    }

    $trainee_repository = new TraineeRepository($this->db);
    $trainee = $trainee_repository->findOne($_GET['id']);

    if (FALSE === $trainee) {
      return "Erreur: l'élément à modifier n'existe pas";
    }

    if (!empty($_POST)) {
      $trainee->setFirstName($_POST['first_name']);
      $trainee->setLastName($_POST['last_name']);
      $trainee->setDateOfBirth($_POST['date_of_birth']);

      $trainee_repository = new TraineeRepository($this->db);
      $trainee_repository->update($trainee);

      $this->message_bag->addMessage("Le stagiaire #{$trainee->getId()} a été modifié");

      $this->redirectTo('/trainee/list');
    }

    return $this->engine->render('trainee-update.html.php', [
      'trainee' => $trainee,
    ]);
  }

  /**
   * @return string
   */
  public function delete() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      return "Erreur: l'élément à modifier n'est pas valide";
    }

    $trainee_repository = new TraineeRepository($this->db);
    $trainee = $trainee_repository->findOne($_GET['id']);

    if (FALSE === $trainee) {
      return "Erreur: l'élément à modifier n'existe pas";
    }

    $trainee_repository = new TraineeRepository($this->db);
    $trainee_repository->delete($trainee);

    $this->redirectTo('/trainee/list');
  }

}
