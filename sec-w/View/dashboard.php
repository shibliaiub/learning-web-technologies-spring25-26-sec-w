<?php 

include "../Model/DatabaseConnection.php";
session_start();
$username = $_SESSION["loggedInUser"] ?? "";
$isLoggedIn = $_SESSION["isLoggedIn"];

$id = $_SESSION["id"] ??"";

$image_path = $_SESSION["image_path"] ??"";

if(!$isLoggedIn){
    Header("Location: login.php");
    exit();
}

$hasCookie = isset($_COOKIE["food"]);

$favFood = $_COOKIE["food"] ??"";

?>


<html>
    <body>
         <?php echo "Hello Mr. $username , welcome to dashboard.";?>
         <a href="../Controller/logout.php" >Logout</a>
         <img src="<?php echo $image_path;?>" height="200px" width="200px"/>

         <!-- For taking input as a new customer -->
        <?php 
        if(!$hasCookie){
           echo '<form action="../Controller/setFavoriteFood.php" method="post" style="margin-top:5%;">
                    <label>Enter favorite food: </label>
                    <input type="text" name="favoriteFood" placeholder="Enter Favorite food"/>
                    <input type="submit" name="submit"/>
                </form>';
        }else{
    echo "<div>
            <p>We know your favorite food, <strong>$favFood</strong>. Want to order again?</p>
            <p>Click <a href='../Controller/deleteCookieHandler.php'>Here </a> to delete cookie </p>
          </div>";
        }
        
        ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Image</th>
        </tr>

    <?php 
     $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->getUserById($connection, "users", $id);
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
        $username = $row['username'];
        $image_path = $row['image_path'];

            echo "<tr>
            <td>$id</td>
            <td>$username</td>
            <td><img src='$image_path' height='20px' width='20px' /></td>
            
            </tr>";
        }
         
    }
    ?>        
</table>
      

         <!-- For known customer -->
         
    </body>
</html>