<html>
    <body>
    <h1>Modifier un stagiaire</h1>
    <?php if (!empty($message)): ?>
      <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post">
      <p>
        <label type="label" for="first_name">Prénom</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $trainee->getFirstName(); ?>" />
      </p>
      <p>
        <label type="label" for="last_name">Nom</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $trainee->getLastName(); ?>" />
      </p>
      <p>
        <label type="label" for="date_of_birth">Date de naissance (format YYYY-MM-DD)</label>
        <input type="text" id="date_of_birth" name="date_of_birth" value="<?php echo $trainee->getFormattedDateOfBirth(); ?>" />
      </p>
      <p>
        <input type="submit" name="submit" value="Modifier" />
        <a href="/trainee/list">Annuler</a>
      </p>
    </form>
    </body>
</html>
