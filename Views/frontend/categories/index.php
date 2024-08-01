<h1>Danh Sách Category</h1>
<?php
    echo $pageTitle;
    echo "<br>";
    foreach($categories as $category){
        echo $category['id'] . " " . $category['name'] . "<br>";
    }
?>