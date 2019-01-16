<html>
  <body>
    <h1>Liste des stagiaires</h1>
    <a href="/trainee/add">Ajouter un stagiaire</a>
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
          <td>
            <a href="/trainee/update?id=<?php echo $trainee->getId(); ?>">Modifier</a>
            <a href="/trainee/delete?id=<?php echo $trainee->getId(); ?>">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
