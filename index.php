<?php
include_once("config/database.php");
$obj    =    new Query();
// Insert Data //
// $data   =   array(
//     "name"  => "Tarun",
//     "email" => "abc@gmail.com",
//     'phone' =>  '999999898'
// );
// $res =  $obj->insertData('users',$data);
### Delete Data ####
$id = 2;
//$delData    =   $obj->deleteData("users","id",$id);
##### Get Data #####
// $result = $obj->getData('users',"*");
// if($row =  $result->num_rows>0){
//     while($row = $result->fetch_assoc()){
//         print_r($row);
//     }
// }

$dataid = 2;
$resultId = $obj->getDatabyId('users',"*",'id',$dataid);
if($row =  $resultId->num_rows>0){
    while($row = $resultId->fetch_assoc()){
        print_r($resultId);
    }
}

//////// Update Data //
$dataUpdate   =   array(
    "name"  => "Rachna",
    "email" => "rrr@gmail.com",
    'phone' =>  '9814803469'
);
$resUpdate =  $obj->updateData('users',$dataUpdate,"id",$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>