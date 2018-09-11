<?php
include('functions.php');
$bdd=getDataBase();
var_dump($_POST);
$chois=$_POST['chois'];
$storId=$_POST['stor_id'];
if(isset($_POST['stor_id']) and $_POST['stor_id']!='' and isset($_POST['chois']) and $_POST['chois']!='' ){
    if($chois=='edition'){


    }
    elseif($chois=='suppression') {


        $req3 = $bdd->prepare('DELETE FROM sales  WHERE stor_id = :storId');
        $req3->execute(array(
            'storId' => $storId
        ));
        $req2 = $bdd->prepare('DELETE FROM discounts WHERE stor_id = :storId');
        $req2->execute(array(
            'storId' => $storId
        ));
        $req = $bdd->prepare('DELETE FROM stores  WHERE stor_id = :storId');
        $req->execute(array(
            'storId' => $storId
        ));
        echo "suppression reussite";
    }

}
?>