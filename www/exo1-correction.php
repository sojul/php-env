<?php

/*
A partir du fichier `employees.csv` :

> Attention : Ce fichier comporte des doublons (à ne pas prendre en compte), et il ne faut considérer que les les personnes dont on connait le prénom ET le nom.

1. Compter le nombre d'employés à Bordeaux
2. Calculer l'âge moyen des employés
3. Générer un nom CSV avec les colonnes :
  * ID
  * Ville
  * Nom en majuscules + prénom (ex: 'KRUPPA Julien')
  * Age
*/

$input_file = 'input/employees.csv';
$output_file = 'output/employees.csv';

if (!is_dir('output')) {
  mkdir('output');
}

$handle = fopen($input_file, 'r');
if (FALSE === $handle) {
  die("Le fichier $input_file est introuvable.");
}

$employees = [];
$nb_bordeaux = 0;
$age_sum = 0;

$i_line = 0;
while (($fields = fgetcsv($handle, 1000, ';')) !== FALSE) {
  if ($i_line++ === 0) {
    // Skip CSV header;
    continue;
  }

  list($id, $first_name, $name, $age, $city) = $fields;

  if (isset($employees[$id])) {
    // Employee is already known, this is a duplicate.
    continue;
  }

  if (empty($name)) {
    // Do not consider employees without name.
    continue;
  }

  // Generate full name.
  $full_name = strtoupper($name) . ' ' .$first_name;

  $employees[$id] = [
    $id,
    $city,
    $full_name,
    $age,
  ];

  if ($city === 'Bordeaux') {
    $nb_bordeaux++;
  }

  $age_sum += $age;
}
fclose($handle);

// Create output CSV.
$handle = fopen($output_file, 'w');
foreach ($employees as $employee) {
  fputcsv($handle, $employee, ';');
}
fclose($handle);

$age_average = $age_sum / count($employees);

echo "<p>Il y a $nb_bordeaux employés à Bordeaux.</p>";
echo "<p>L'âge moyen est de $age_average ans.</p>";
echo "<p>Le fichier $output_file a été créé.</p>";
