
    <?php
    
    $clientfirstname = htmlspecialchars ($_POST['clientfirstname']);
    $clientlastname = htmlspecialchars ($_POST['clientlastname']);
    $clientemail = htmlspecialchars ($_POST['clientemail']);
    $clientpassword = htmlspecialchars ($_POST['clientpassword']);
    $clienttype = htmlspecialchars ($_POST['clienttype']);

    require_once "../connections/dbconnect.php";
    $db = getdb();

    $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
        VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword, :clienttype)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientfirstname', $clientfirstname);
    $stmt->bindValue(':clientlastname', $clientlastname);
    $stmt->bindValue(':clientemail', $clientemail);
    $stmt->bindValue(':clientpassword', $clientpassword);
    $stmt->bindValue(':clienttype', $clienttype);

    $stmt->execute();

    $clientId = $db->lastInsertId("clientid_seq");
    

    include '../view/login.php';