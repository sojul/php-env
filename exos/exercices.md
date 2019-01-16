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

## Exo #3

1. Modifier la classe `Trainee` pour qu'elle étende la classe `Entity`. Adapter le constructeur en fonction.

2. Dans le fichier `exo-3.php` créer deux nouveaux objets `Trainee` et modifier / appeler la méthode `TraineeRepository::add()` pour les insérer en base.
  Stocker l'ID généré dans les objets `Trainee` et afficher les objets après insertion avec un `var_dump()`.

## Exo #4

1. Modifier le fichier `exo4.php` pour utiliser le formulaire et permettre d'ajouter de nouveaux stagiaires.

2. Créer un nouveau fichier `list.php` qui permettra d'afficher sous forme de tableau la liste des stagiaires.
