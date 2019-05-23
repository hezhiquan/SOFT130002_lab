<?php

    function outputOrderRow($file, $title, $quantity, $price) {
        echo "<tr>";
        //TODO
        echo "<td> <img src='images/books/tinysquare/$file'></td>";
        echo "<td>$title</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>$".number_format($price,2,".","")."</td>";
        echo "<td>$".number_format($price*$quantity,2,".","")."</td>";
        echo "</tr>";
    }
?>