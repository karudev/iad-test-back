<?php
require __DIR__."/vendor/autoload.php";
use App\Model\DB;

try {
    $db = DB::getInstance();

    $dbSQL = __DIR__ . '/install/db.sql';

    $sql = file_get_contents($dbSQL);
    $requests = explode(';', $sql);
    foreach ($requests as $request){
        if($request !== '') {
            $stm = $db->prepare($request);
            $stm->execute();
            echo "This request has been executed :<br/>" . $request."<br/><br/>";
        }
    }


} catch (Exception $e) {
    print $e->getMessage();

}