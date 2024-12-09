<?php


$serverName     = "localhost";
$dbName         = "bchermsi";
$user           = "bchermsi";
$pw             = "50177BenC";


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
print("started");


$ID = $_POST["ID"];
$Accession = $_POST["Accession"];
$IDget = $_POST["IDget"];
$Accessionget = $_POST["Accessionget"];
$TypeGet = $_POST["TypeGet"];
$Acquisitionget = $_POST["Acquisitionget"];
$Artistget = $_POST["Artistget"];
$Titleget = $_POST["Titleget"];
$Object_Namegetget = $_POST["Object_Namegetget"];
$Techniquesget = $_POST["Techniquesget"];
$Dimensionsget = $_POST["Dimensionsget"];
$Descriptionget = $_POST["Descriptionget"];
$Cultureget = $_POST["Cultureget"];
$Dynastyget = $_POST["Dynastyget"];
$textget = $_POST["textget"];
$Description = $_POST["Description"];
$ALLInfoGet = $_POST["ALL"];

$infoGetsCheckboxes = array($IDget, $Accessionget, $TypeGet, , $Acquisitionget, $Artistget, $Titleget, $Object_Namegetget, $Techniquesget, $Dimensionsget, $Descriptionget, $Cultureget, $Dynastyget, $textget, $Description);
$getCorrospondingName = array(
"ObjectID",
"Accession_Number",
"Classification",
"Acquisition_Method",
"Artist_Maker",
"Title",
"Object_Name",
"Materials_Techniques",
"Dimensions",
"Description",
"Culture",
"Period_Dynasty",
"Department",
"eMuseum_Label_Text"
);

print("line 2");

// $Asian = $_POST["Asian"];
// $European = $_POST["European"];
// $American = $_POST["American"];
// $Indian = $_POST["Indian"];
// $African = $_POST["African"];
// $Modern = $_POST["Modern"];
// $ALLDepartment = $_POST["ALLDepartment"];
// $artest = $_POST["artest"];
// $Title = $_POST["Title"];
// $ObjectName = $_POST["Object Name"];
// $year = $_POST["year"];
// $Techniques = $_POST["Techniques"];
// $CreditLine = $_POST["Credit Line"];
// $keywords = $_POST["keywords"];
// $Edo = $_POST["Edo"];
// $Meiji = $_POST["Meiji"];
// $Ming = $_POST["Ming"];
// $Qing = $_POST["Qing"];
// $Showa = $_POST["Showa"];
// $allDinastys = $_POST["allDinastys"];
// $dinastys = $_POST["dinastys"];
// $Bequest = $_POST["Bequest"];
// $found = $_POST["found"];
// $Gift = $_POST["Gift"];
// $Purchase = $_POST["Purchase"];
// $Rental = $_POST["Rental"];
// $otherAquisition = $_POST["otherAquisition"];
// $allAquisition = $_POST["allAquisition"];



// // $csci = $_POST["csci"];
// // $finance = $_POST["finance"];
// // $music = $_POST["music"];
// // $physics = $_POST["physics"];
// // $history = $_POST["history"];
// // $bio = $_POST["biology"];
// // $elecEng = $_POST["elecEng"];
// // $all = $_POST["ALL"];
// // $minSalary = $_POST["minSalary"];
// // $maxSalary = $_POST["maxSalary"];



// function PrintPage($body, $year) {
//   print("<!DOCTYPE html>\n");
//   print("<html>\n<head>\n<title>This is the movie handler!</title>\n");
//   print("</head>\n<body>\n");

//   print("<h1>professors matching your Querry $year</h1>\n");

//   print("<div class='formOutput'>$body\n</div>\n");

//   print("</body>\n</html>\n");
//   //print("yooo");
// }



// $conn = new PDO("mysql:host=$serverName;dbname=$dbName",
//          $user = "bchermsi", $pw = "50177BenC");
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $insSTMT =
//         //$instSTMT = $conn->prepare('INSERT INTO instructor (ID, name, dept_name, salary) VALUES (:id, :name, :dept, :salary);');
// $queryResult = null;


// $stm = "FROM instructor WHERE 1=1";
// if ($ALLInfoGet === "on"){
// 	$stm = "SELECT * FROM instructor WHERE 1=1";
// }
// else{
// 	$stm = "FROM instructor WHERE 1=1";
// 	for ($i=0; $i<count($infoGetsCheckboxes); $i++){
// 		if($infoGetsCheckboxes[$i] === "on"){
// 			$stm = 	getCorrospondingName[$i] . ", " . $stm;
// 		}
// 	}
// 	$stm = "SELECT " . $stm;

// }

// $subArray = array();

// // $subArray = array();




// // if($csci === "on"){
// //     $stm = $stm . " OR dept_name= 'Comp. Sci.'";
// // }

// //  $conn = new PDO("mysql:host=$serverName;dbname=$dbName",
// // 	 $user = "bchermsi", $pw = "50177BenC");
// // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// // $insSTMT = 
// // 	//$instSTMT = $conn->prepare('INSERT INTO instructor (ID, name, dept_name, salary) VALUES (:id, :name, :dept, :salary);');
// // $queryResult = null;
// // $stm = "SELECT * FROM instructor WHERE 1=1";

// // $subArray = array();
// // if ($name === "ALL" OR $name === ""){
    
// // }
// // else{
// // 	$stm = $stm . " AND name=:name";
// // 	$subArray[':name'] = $name;
// // }
// // if($ID ==="" OR $ID === "ALL"){

// // }
// // else{
// // 	$stm = $stm . " AND ID =:id";
// // 	$subArray[':id'] = $ID;
// // }
// // if($all === "on"){
// // }
// // else{
// // 	$stm = $stm . " (1=0";
// // 	if($csci === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Comp. Sci.'";
// // 	}

// // 	if($finance === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Finance'";
// // 	}
// // 	if($music === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Music'";
// // 	}
// // 	if($physics === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Physics'";
// // 	}
// // 	if($history === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Physics'";
// // 	}
// // 	if($biology === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Biology'";
// // 	}
// // 	if($elecEng === "on"){
// // 	    $stm = $stm . " OR dept_name= 'Elec. Eng.'";
// // 	}
// // 	$stm = $stm . ")";
// // }
// // if($maxSalary == ""){
// // }
// // else{
// // 	$stm = $stm . " AND salary<:max";
// // 	$subArray[':max'] = $maxSalary;
// // }
// // if($minSalary == ""){
   
// // }
// // else{
// // 	$stm = $stm . " AND salary>:min";
// // 	$subArray[':min'] = $minSalary;
// // }

// $stm = $stm . ";";
// $stmPre = $conn->prepare($stm);
// $stmPre->execute($subArray);
//  $body = "<table><tr><th>ID</th><th>Name</th><th>salary</th><th>department</th></tr>";
//  foreach($stmPre->fetchAll(PDO::FETCH_ASSOC) as $key =>$val ) {
//     $body .= "<tr><td>$key</td><td>" .
//                    $val['name'] .
//                    "</td><td>" . $val['salary'] . "</td><td>" . $val["dept_name"] ."</td></td>\n";
//  }
// printPage($body, 1);


// //$insSTMT->execute(array(':id'=>$ID, ':name'=>$name, ':dept'=>$dep, ':salary'=>$salary));

