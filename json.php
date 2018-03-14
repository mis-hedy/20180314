<?php
header("Content-Type:text/html; charset=utf-8");
$servername = "localhost";
$username = "mis02";
$password = "6683DH";
$db="my_db";
$con = new mysqli($servername, $username, $password,$db);
   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   	if (!$con->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $con->error);
    exit();
}   
$result = mysqli_query($con,"SELECT * FROM news");  
$jsonData = array();
while ($array = mysqli_fetch_row($result)) {
	//echo $array[2]."<br>";
    $jsonData[] = $array;
}

echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
//[["1","最新消息","這是一則勁爆的消息",null,null],["2","最新消息","這是一則勁爆的消息",null,null],["3","最新消息","這是一則勁爆的消息",null,null],["4","goodjob","這是一則描述","2018-02-23 07:31:35","2018-02-23 07:31:35"],["5","利用create新增的","create的描述","2018-02-23 07:36:15","2018-02-23 07:36:15"]]   
echo "<br>";
echo  "=================================================================================================";
echo "<br>";
$cart = array(
  "orderID" => 12345,
  "shopperName" => "John Smith",
  "shopperEmail" => "johnsmith@example.com",
  "contents" => array(
    array(
      "productID" => 34,
      "productName" => "產品",
      "quantity" => 1
    ),
    array(
      "productID" => 56,
      "productName" => "WonderWidget",
      "quantity" => 3
    )
  ),
  "orderCompleted" => true
);
 
echo json_encode( $cart,JSON_UNESCAPED_UNICODE );

//{"orderID":12345,"shopperName":"John Smith","shopperEmail":"johnsmith@example.com","contents":[{"productID":34,"productName":"產品","quantity":1},{"productID":56,"productName":"WonderWidget","quantity":3}],"orderCompleted":true}
echo "<br>";
echo  "=================================================================================================";
echo "<br>";
$jsonString = '
{                                           
  "orderID": 12345,                         
  "shopperName": "John Smith",              
  "shopperEmail": "johnsmith@example.com",  
  "contents": [                             
    {                                       
      "productID": 34,                      
      "productName": "產品",         
      "quantity": 1                        
    },                                      
    {                                       
      "productID": 56,                      
      "productName": "WonderWidget",        
      "quantity": 3                         
    }                                       
  ],                                        
  "orderCompleted": true                    
}                                           
';
 
$cart = json_decode( $jsonString );
echo $cart->shopperEmail . "<br>";
echo $cart->contents[0]->productName . "<br>";
//johnsmith@example.com
//產品
echo "<br>";
echo  "=================================================================================================";
echo "<br>";
echo json_encode(array(1, 2, 3));
echo json_encode(array(1, 2, 3), JSON_FORCE_OBJECT);
echo json_encode(array(array(1, 2, 3)));
echo json_encode(array(array(1, 2, 3)), JSON_FORCE_OBJECT);
echo json_encode(array(1 => 123, 2 => 'abc'));
//[1,2,3]
//{"0":1,"1":2,"2":3}
//[[1,2,3]]
//{"0":{"0":1,"1":2,"2":3}}
//{"1":123,"2":"abc"} // 本來就會輸出 Object
echo "<br>";
echo  "=================================================================================================";
echo "<br>";
$myArr = array("John", "Mary", "Peter", "Sally");
echo $myArr[0]."<br>";
$myJSON = json_encode($myArr);
echo $myJSON;
echo "<br>";
echo  "=================================================================================================";
echo "<br>";
//with索引
$class=array(
"A班"=>array(1=>"皮卡丘",2=>"妙蛙種子",3=>"小火龍",4=>"傑尼龜"),
"B班"=>array(1=>"巴大蝴",2=>"波波",3=>"大嘴雀",4=>"胖丁"),
"C班"=>array(1=>"超音蝠",2=>"可達鴨",3=>"卡蒂狗",4=>"火爆猴")
);
foreach($class as $key=>$val){
	echo "<h1>{$key}</h1><p>";
	foreach($val as $key2=>$val2)
	{
		echo "{$key2}號{$val2}";
	}
	echo "</p>";
}
?>

