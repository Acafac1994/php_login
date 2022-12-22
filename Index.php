<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   if(isset($_POST["submit"])){
       require("mysql.php");
       $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // Username überprüfen
       $stmt->bindParem(":user", $_POST["username"]);
       $stmt->execute();
       $count = $stmt->rowCount();
       if($count ==0){
        // Username ist frei
        if($_POST["pw"] ==["pw2"]){
            //Username anlegen
            $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD) VALUES (:user, :pw)") 
            $stmt->bindParem(":user", $_POST["username"]);
            $stmt->bindParem(":pw", $_POST["username"]);

        }
       } else {
           echo "Die Passwörter stimmen nicht überein";
       }
       } else {
        echo "Der Username ist vergeben"

   }

   ?>
    <h1>Regetsrieren</h1>
    <form action="register.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="pw" placeholder="Passwort" required><br>
    <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
    <button type="submit" name="submit">Erstellen</button>
</form>
<br>
<a href="index.php">Hast du bereits einen Account</a>
</body>
</html>