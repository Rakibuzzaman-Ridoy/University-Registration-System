<?php 
    if(!function_exists('printResult'))
    {
        function printResult($result)
        {
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }