<h1>Danh Sách Category</h1>
<?php
    echo $pageTitle;
    foreach($categories as $category){
        echo $categories['id']. '<br>';
    }
?>