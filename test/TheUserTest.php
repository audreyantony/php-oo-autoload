<?php

/*
 * Test TheNews.php model
 */

require_once "../config/config.php";

spl_autoload_register(
    function($className){
        require "../model/".$className.".php";
    }
);

try{
    $myConnect = new MyPDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_LOGIN,DB_PWD,ENV_DEV);
}catch(PDOException $e){
    die($e->getMessage());
}

$test = new TheUser(["idtheUser"=>5,"theUserLogin"=>"-Bonjour<br> les amis","theUserPwd"=>"DELETE ...","theUserMail"=>"gg@gg.com","theSectionDesc"=>"2020-02-21","theRoleIdtheRole"=>3]);
?>
<pre><?php var_dump($test);?></pre>

