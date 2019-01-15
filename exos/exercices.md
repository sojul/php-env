# Exercices

## Exo #1

A partir du fichier `employees.csv` :

> Attention : Ce fichier comporte des doublons (à ne pas prendre en compte), et il ne faut considérer que les les personnes dont on connait le prénom ET le nom.

1. Compter le nombre d'employés à Bordeaux
2. Calculer l'âge moyen des employés
3. Générer un nom CSV avec les colonnes :
  * ID
  * Ville
  * Nom en majuscules + prénom (ex: 'KRUPPA Julien')
  * Age


## Exo #2

1. Créer une classe `CleverAge\Formation\Logger\DbLogger` respectant l'interface `LogInterface`.
Elle devra permettre de logguer un message en base de donnée dans la table `logs` avec un timestamp.

2. Dans le fichier `exo-2.php`, instancier et appeler cette nouvelle classe et logguer un message à chaque visite.

3. Modifier la classe `Trainee` pour qu'elle étende la classe `Entity`. Adapter le constructeur en fonction.

4. Dans le fichier `exo-2.php` créer deux nouveaux objets `Trainee` et modifier / appeler la méthode `TraineeRepository::insert()` pour les insérer en base. Retourner l'ID généré par MySQL.
