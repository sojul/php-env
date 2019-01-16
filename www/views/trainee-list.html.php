<html>
  <body>
    <h1>Liste des stagiaires</h1>
    <a href="/exo4.php">Ajouter un stagiaire</a>
    <table>
      <?php foreach ($trainees as $trainee): ?>
        <tr>
          <td>
            <?php echo $trainee->getId(); ?>
          </td>
          <td>
            <?php echo $trainee->getFirstName(); ?>
          </td>
          <td>
            <?php echo $trainee->getLastName(); ?>
          </td>
          <td>
            <?php echo $trainee->getAge(); ?>
          </td>
          <td>
            <?php echo $trainee->getFormattedDateOfBirth(); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
