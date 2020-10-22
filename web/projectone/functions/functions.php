<?php
function checkEmail($clientemail)
{
    $valEmail = filter_var($clientemail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}


// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientpassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientpassword);
}


function checkExistingEmail($clientemail)
{
  $db = getdb();
  $sql = 'SELECT clientemail 
          FROM clients 
          WHERE clientemail = :clientemail';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientemail', $clientemail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if (empty($matchEmail)) {
    return 0;
  } else {
    return 1;
  }
}