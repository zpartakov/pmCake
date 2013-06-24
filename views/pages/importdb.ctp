 <?php

  $zip = new ZipArchive;
    $zip->open('akademiach4.sql.zip');
    $zip->extractTo('./');
    $zip->close();
        echo "Ok!"; 
?> 
