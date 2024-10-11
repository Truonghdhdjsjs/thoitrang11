<?php
    function showArray($arr)
    {
        echo "<prev>";
            var_dump($arr);
        echo "</prev>";
    }
    function debug($arr)
    {
        echo "<prev>";
            print_r($arr);
        echo "</prev>";
        die();
    }
    function show_error($error, $key){
        echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';
    }