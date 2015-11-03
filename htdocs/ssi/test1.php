<?php    

require_once 'db2.php';
    $taste_query = "SELECT tasteid FROM tastes WHERE factor = 'Beef'";
    $taste_res = mysqli_fetch_assoc(mysqli_query($conn, $taste_query));
    $taste_res = $taste_res['tasteid'];
    $query = "INSERT INTO style (recipe_id, factor_id) VALUES ('$last_id', '$taste_res')";
    
    echo "good.";
    ?>