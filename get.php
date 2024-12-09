<?php


$serverName     = "localhost";
$dbName         = "bchermsi";
$user           = "bchermsi";
$pw             = "50177BenC";

$name = $_POST["name"];
$ID = $_POST["ID"];
$csci = $_POST["csci"];
$finance = $_POST["finance"];
$music = $_POST["music"];
$physics = $_POST["physics"];
$history = $_POST["history"];
$bio = $_POST["biology"];
$elecEng = $_POST["elecEng"];
$all = $_POST["ALL"];
$minSalary = $_POST["minSalary"];
$maxSalary = $_POST["maxSalary"];



function PrintPage($body, $year) {
  print("<!DOCTYPE html>\n");
  print("<html>\n<head>\n<title>This is the movie handler!</title>\n");
  print("</head>\n<body>\n");

  print("<h1>professors matching your Querry $year</h1>\n");

  print("<div class='formOutput'>$body\n</div>\n");

  print("</body>\n</html>\n");
  //print("yooo");
}


//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);



if($csci === "on"){
    $stm = $stm . " OR dept_name= 'Comp. Sci.'";
}

 $conn = new PDO("mysql:host=$serverName;dbname=$dbName",
	 $user = "bchermsi", $pw = "50177BenC");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$insSTMT = 
	//$instSTMT = $conn->prepare('INSERT INTO instructor (ID, name, dept_name, salary) VALUES (:id, :name, :dept, :salary);');
$queryResult = null;
$stm = "SELECT * FROM instructor WHERE 1=1";

$subArray = array();
if ($name === "ALL" OR $name === ""){
    
}
else{
	$stm = $stm . " AND name=:name";
	$subArray[':name'] = $name;
}
if($ID ==="" OR $ID === "ALL"){

}
else{
	$stm = $stm . " AND ID =:id";
	$subArray[':id'] = $ID;
}
if($all === "on"){
}
else{
	$stm = $stm . " (1=0";
	if($csci === "on"){
	    $stm = $stm . " OR dept_name= 'Comp. Sci.'";
	}

	if($finance === "on"){
	    $stm = $stm . " OR dept_name= 'Finance'";
	}
	if($music === "on"){
	    $stm = $stm . " OR dept_name= 'Music'";
	}
	if($physics === "on"){
	    $stm = $stm . " OR dept_name= 'Physics'";
	}
	if($history === "on"){
	    $stm = $stm . " OR dept_name= 'Physics'";
	}
	if($biology === "on"){
	    $stm = $stm . " OR dept_name= 'Biology'";
	}
	if($elecEng === "on"){
	    $stm = $stm . " OR dept_name= 'Elec. Eng.'";
	}
	$stm = $stm . ")";
}
if($maxSalary == ""){
}
else{
	$stm = $stm . " AND salary<:max";
	$subArray[':max'] = $maxSalary;
}
if($minSalary == ""){
   
}
else{
	$stm = $stm . " AND salary>:min";
	$subArray[':min'] = $minSalary;
}
$stm = $stm . ";";
$stmPre = $conn->prepare($stm);
$stmPre->execute($subArray);
 $body = "<table><tr><th>ID</th><th>Name</th><th>salary</th><th>department</th></tr>";
 foreach($stmPre->fetchAll(PDO::FETCH_ASSOC) as $key =>$val ) {
    $body .= "<tr><td>$key</td><td>" .
                   $val['name'] .
                   "</td><td>" . $val['salary'] . "</td><td>" . $val["dept_name"] ."</td></td>\n";
 }
printPage($body, 1);


//$insSTMT->execute(array(':id'=>$ID, ':name'=>$name, ':dept'=>$dep, ':salary'=>$salary));

