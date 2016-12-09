<?php
$newURL = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'dist'; 

header('Location: '.$newURL);