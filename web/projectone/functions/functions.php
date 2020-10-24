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
          FROM client
          WHERE clientemail = :clientemail';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientemail', $clientemail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

  if (empty($matchEmail)) {
    return 0;
  } else {
    return 1;
  }
}

function getAccountInfo($clientid)
{

  $db = getdb();
  $sql = 'SELECT clientid, clientfirstname, clientlastname, clientemail
          FROM client
          WHERE clientid = :clientid';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientid', $clientid);
  $stmt->execute();
  $clientInfoGet = $stmt->fetch();

  return $clientInfoGet;
}


//Update info

function updateClientAcc($clientfirstname, $clientlastname, $clientemail, $clientid)
{

  $db = getdb();
  $sql = 'UPDATE client 
          SET clientfirstname = :clientfirstname, clientlastname = :clientlastname,
                    clientemail =:clientemail
          WHERE clientid =:clientid';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientfirstname', $clientfirstname);
  $stmt->bindValue(':clientlastname', $clientlastname);
  $stmt->bindValue(':clientemail', $clientemail);
  $stmt->bindValue(':clientid', $clientid);

  $stmt->execute();

  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}


//POST JOB 


function getSpecificJob($jobid)
{
  $db = getdb();
  $sql = 'SELECT * , category.categoryname, category.categoryid
              FROM job 
              INNER JOIN category
              On job.categoryid = category.categoryid
              WHERE jobid = :jobid';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':jobid', $jobid, PDO::PARAM_INT);
  $stmt->execute();
  $jobAllDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $jobAllDetails;
}


function getJobPostByClient($clientid)
{
  $db = getdb();
  $sql = 'SELECT job.*, category.*, client.*
              FROM job 
              INNER JOIN client
              ON job.clientid = client.clientid 
              INNER JOIN category 
              ON job.categoryid = category.categoryid
              WHERE job.clientid = :clientid
              ORDER BY jobid DESC';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientid', $clientid, PDO::PARAM_INT);
  $stmt->execute();
  $post = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $post;
}

// Job post review
function buildJobDisplay($postdetails)
{

  $jpd = '<ul class= "review-post">';
  foreach ($postdetails as $clientpost) {

    $jname = $clientpost['jobname'];
    $screenName = $jname;

    $jpd .= "<li class='review-job'>";
    $jpd .= "<span class='review-name'>$screenName </span>";
    $jpd .= "</li>";
  }

  $jpd .= '</ul>';
  return $jpd;
}



function buildJobPost($postclientdetails)
{

  $clientid = $_SESSION['clientdata']['clientid'];

  $reviewClientJob = getJobPostByClient($clientid);

  $jp = "<h2 class= 'review-header'> Jobs Posts </h2>";
  $jp .= "<div class= 'client-post-display'>";

  if (count($reviewClientJob) > 0) {

    $jp .= "<table class= 'review-table'>";
    $jp .= "<thead class= 'review-cliet-list'>";
    $jp .= "<tr><th class= 'review-table-prod'>Job Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>";
    $jp .= "</thead>";
    $jp .= "<tbody>";
    foreach ($postclientdetails as $postitemdetails) {


      $jp .= "<tr><td class='job-name-post'> $postitemdetails[jobname]</td>";
      $jp .= "<td class='review-mod'><a href='/projectone/process/update-post.php?id=$postitemdetails[jobid]' title='Edit'> Edit</a></td>";
      $jp .= "<td class='review-del'><a href='/projectone/process/process-delete-job.php?id=$postitemdetails[jobid]' title='Delete'> Delete</a></td>";
      $jp .= "</tr>";
    }
    $jp .= "</tbody>";
    $jp .= "</table>";
    $jp .= "</div>";
    return $jp;
  }
}



function updateJobPost( $jobid, $jobname, $jobcompany, $joblocation, $jobsalary, $jobrequirements,
                        $jobresponsibilities, $jobdescription, $categoryid, $clientid)
{
  $db = getdb();
  $sql = 'UPDATE job 
          SET jobname =:jobname, jobcompany =:jobcompany, joblocation =:joblocation, jobsalary =:jobsalary,
              jobrequirements =:jobrequirements, jobresponsibilities =:jobresponsibilities, jobdescription =:jobdescription,
              categoryid =:categoryid
          WHERE jobid =:jobid';
  
  
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':jobid', $jobid);
  $stmt->bindValue(':jobname', $jobname);
  $stmt->bindValue(':jobcompany', $jobcompany);
  $stmt->bindValue(':joblocation', $joblocation);
  $stmt->bindValue(':jobsalary', $jobsalary);
  $stmt->bindValue(':jobrequirements', $jobrequirements);
  $stmt->bindValue(':jobresponsibilities', $jobresponsibilities);
  $stmt->bindValue(':jobdescription', $jobdescription);
  $stmt->bindValue(':categoryid', $categoryid);
  $stmt->bindValue(':clientid', $clientid);

  $stmt->execute();

  $jobChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $jobChanged;
}
