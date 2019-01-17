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

3. Renommer le fichier `exo4.php` en `add.php`.

   Après l'ajout d'un stagiaire (depuis `add.php`), rediriger l'utilisateur vers la liste des stagiaires.
   
   Au dessus de cette liste, ajouter un lien vers le formulaire d'ajout.
   
4. Créer une page `update.php` qui permet de modifier un stagiaire :
   * Dans la liste des stagiaires, ajouter sur chaque ligne un lien "Modifier"  
   * Afficher un formulaire pré-rempli avec les valeurs du stagiaire à modifier
   * Rediriger vers la liste après modification

## Exo #5

Try / Catch : La suppression de certains stagiaires renvoie une Fatal Error de MySQL.
* Ne pas tenter de la corriger mais capturer l'exception et ajoueter un message d'erreur "Impossible de supprimer l'utilisateur XXX" à la liste des messages (voir MessageBag).
* Rediriger ensuite vers la page /trainee/list.

## Exo #6

1. A l'ajout d'un utilisateur, utiliser la librairie SwiftMailer pour envoyer un mail "simple" à jkruppa@clever-age.com
   Indice: Passer par le serveur SMTP `smtp.free.fr`

2. Envoyer un mail au format HTML reprenant les informations du stagiaire.
   Indice: Utiliser le template engine pour générer le HTML 

3. Créer une classe `\CleverAge\Formation\Utils\Mail qui devra permettre de nous simplifier l'envoi de mail.
   Cette classe nous servira de couche d'abstraction avec SwiftMailer.
   Elle devra avoir les méthodes publiques suivantes (en reprenant le même type de paramètres qu'attendus par `SwiftMessage`):
   ```
   
     ->setSubject(string);
     ->setFrom(array);
     ->setTo(array);
     ->sendFromTemplate($template_name, $parameters)
   ```
   
   La finalité est d'y "cacher" la gestion des différentes classes de SwiftMailer pour en simplifier l'usage. Le SMTP y sera directement défini "en dur".
   
   On devrait pouvoir envoyer des mails avec un code de la sorte :
   
   ```
   // On est obligés de fournir $engine pour gérer les templates
   $mail = new \CleverAge\Formation\Utils\Mail($engine);
   $mail->setSubject('Nouvel utilisateur');
   $mail->setFrom(['mon_mail@gmail.com', Mon Mail]);
   $mail->setTo(['jkruppa@clever-age.com', 'Julien Kruppa']);
   $mail->sendFromTemplate('mon-template.html.php', $trainee)
   ``` 
   
4. Comment réussir à chaîner les méthodes comme le fait `Swift_Message` ?

   Objectif:
   
   ```
   $mail = new \CleverAge\Formation\Utils\Mail($engine);
   
   $mail->setSubject('Nouvel utilisateur');
     ->setFrom(['mon_mail@gmail.com', Mon Mail]);
     ->setTo(['jkruppa@clever-age.com', 'Julien Kruppa']);
     ->sendFromTemplate('mon-template.html.php', $trainee)
   ```
   
   
     
