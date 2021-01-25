<?php
 
const DATAFILE = 'inscriptions.csv';
 
function securisation($champ){
  $champ = trim($champ);
  $champ = stripslashes($champ);
  $champ = strip_tags($champ);
  $champ = htmlspecialchars($champ);
  return $champ;
}
 
function ajout($nom, $prenom, $email, $mot_de_passe)
{
  $datetime = date("Y-m-d H:i:s");
  $data = [$nom, $prenom, $email, $mot_de_passe];
  $file = fopen(DATAFILE, 'a');
  fputcsv($file, $data);
  fclose($file);
}
 
function lecture()
{
    $file = fopen(DATAFILE, 'a+');
    $donnees = array();
    while(true)
    {
        $data = fgetcsv($file);
        if($data == false) {
            break;
        }
        array_push($donnees, $data);
    }
    fclose($file);
    return $donnees;
}
 
function enregistrer(array $data)
{
    $file = fopen(DATAFILE, 'w');
    foreach($data as $data_row)
    {
        fputcsv($file, $data_row);
    }
    fclose($file);
}
 
function supprimer(array $data, array $item)
{
    $newdata = array();
 
    foreach($data as $index => $data_row)
    {
      if (in_array($index, $item) == false) {
        array_push($newdata, $data_row);
      }
    }
    return $newdata;
}
 
?>