<?php


$serverName     = "localhost";
$dbName         = "bchermsi";
$user           = "bchermsi";
$pw             = "50177BenC";


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL ^ E_WARNING);
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
$artMedium = $_POST["artMedium"];

$infoGetsCheckboxes = array($IDget, $Accessionget, $TypeGet,  $Acquisitionget, $Artistget, $Titleget, $Object_Namegetget, $Techniquesget, $Dimensionsget, $Descriptionget, $Cultureget, $Dynastyget, $textget, $Description);
$getCorrospondingName = array("ObjectID","Accession_Number","Classification","Acquisition_Method","Artist_Maker","Title","Object_Name","Materials_Techniques","Dimensions","Description","Culture","Period_Dynasty","Department","eMuseum_Label_Text");

print("line 2");

$numResults = $_POST["numResults"];
$Asian = $_POST["Asian"];
$European = $_POST["European"];
$American = $_POST["American"];
$Indian = $_POST["Indian"];
$African = $_POST["African"];
$Modern = $_POST["Modern"];
$ALLDepartment = $_POST["ALLDepartment"];
$artest = $_POST["artest"];
$Title = $_POST["Title"];
$ObjectName = $_POST["Object Name"];
$year = $_POST["year"];
$Techniques = $_POST["Techniques"];
$CreditLine = $_POST["Credit Line"];
$keywords = $_POST["keywords"];
$Edo = $_POST["Edo"];
$Meiji = $_POST["Meiji"];
$Ming = $_POST["Ming"];
$Qing = $_POST["Qing"];
$Showa = $_POST["Showa"];
$allDinastys = $_POST["allDinastys"];
$dinastys = $_POST["dinastys"];
$Bequest = $_POST["Bequest"];
$found = $_POST["found"];
$Gift = $_POST["Gift"];
$Purchase = $_POST["Purchase"];
$Rental = $_POST["Rental"];
$otherAquisition = $_POST["otherAquisition"];
$allAquisition = $_POST["allAquisition"];


print("print 3");

// $csci = $_POST["csci"];
// $finance = $_POST["finance"];
// $music = $_POST["music"];
// $physics = $_POST["physics"];
// $history = $_POST["history"];
// $bio = $_POST["biology"];
// $elecEng = $_POST["elecEng"];
// $all = $_POST["ALL"];
// $minSalary = $_POST["minSalary"];
// $maxSalary = $_POST["maxSalary"];



function PrintPage($body, $year) {
  print("<!DOCTYPE html>\n");
  print("<html>\n<head>\n<title>This is the movie handler!</title>\n");
  print("</head>\n<body>\n");

  print("<h1>art matching your Querry</h1>\n");

  print("<div class='formOutput'>$body\n</div>\n");

  print("</body>\n</html>\n");
  //print("yooo");
}



$conn = new PDO("mysql:host=$serverName;dbname=$dbName",
         $user = "bchermsi", $pw = "50177BenC");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$insSTMT =
        //$instSTMT = $conn->prepare('INSERT INTO instructor (ID, name, dept_name, salary) VALUES (:id, :name, :dept, :salary);');
$queryResult = null;


$stm = "FROM museum WHERE 1=1";
if ($ALLInfoGet === "on"){
	$stm = "SELECT * FROM instructor WHERE 1=1";
}
else{
	$stm = "FROM museum WHERE 1=1";
	$first = 0;
	for ($i=0; $i<count($infoGetsCheckboxes); $i++){
		if($infoGetsCheckboxes[$i] === "on"){
			if($first === 0){
				$stm = 	$getCorrospondingName[$i] . " " . $stm;
				$first = 1;
			}
			else{
				$stm = 	$getCorrospondingName[$i] . ", " . $stm;

			}

			
		}
	}
	$stm = "SELECT " . $stm;

}

$subArray = array();




if(!empty($artest)){
	$stm = $stm . " AND Artist_Maker LIKE :artest";
	$subArray[":artest"] = "%" . $artest . "%";
}

if(!empty($ID)){
	$stm = $stm . " AND ObjectID=:ID";
	$subArray[":ID"] =  $ID;
}

if(!empty($name)){
	$stm = $stm . " AND Artist_Maker LIKE :Pname";
	$subArray[":Pname"] = "%" . $artest . "%";
}

if(!empty($keywords)){
	$keyWordList = explode(",", $keywords);
	//for($keyWordNum = 0; $keyWordNum<sizeof($keyWordList); $keyWordNum++){
		//$keywords = $keyWordList[$keyWordNum];
		$keyWordNum = "0";
		$stm = $stm . " AND (eMuseum_Label_Text LIKE :keyWord1$keyWordNum OR Period_Dynasty LIKE :keyword2$keyWordNum OR Materials_Techniques LIKE :keyword4$keyWordNum OR Object_Name LIKE :keyword5$keyWordNum OR Title LIKE :keyword6$keyWordNum OR Culture LIKE :keyword7$keyWordNum)";
		$subArray[":keyWord1$keyWordNum"] = "%" . $keywords . "%";
		$subArray[":keyWord2$keyWordNum"] = "%" . $keywords . "%";
		//$subArray[":keyWord3$keyWordNum"] = "%" . $keywords . "%";
		$subArray[":keyWord4$keyWordNum"] = "%" . $keywords . "%";
		$subArray[":keyWord5$keyWordNum"] = "%" . $keywords . "%";
		$subArray[":keyWord6$keyWordNum"] = "%" . $keywords . "%";
		$subArray[":keyWord7$keyWordNum"] = "%" . $keywords . "%";
	//}
}





if(empty($ALLDepartment)){
	$stm = $stm . " AND (1=0";
	if(!empty($Asian)){
		$stm = $stm . " OR Department='Asian Art'";
	}
	if(!empty($European)){
		$stm = $stm . " OR Department='European Art'";
	}
	if(!empty($American)){
		$stm = $stm . " OR Department='American Art'";
	}
	if(!empty($Indian)){
		$stm = $stm . " OR Department='Pre-Columbian and American Indian'";
	}
	if(!empty($African)){
		$stm = $stm . " OR Department='African Art and Oceania'";
	}
	if(!empty($Modern)){
		$stm = $stm . " OR Department='Modern and Contemporary Art'";
	}
	$stm = $stm . ")";

}




if(!empty($numResults)){
	if(ctype_digit($numResults)){
		if((int)$numResults<100){
		    $stm = $stm . " LIMIT $numResults";
		}
		else{
			$stm = $stm . " LIMIT 100";			
		}
	}
}

//print("<P>$subArray</P>");


$stm = $stm . ";";
$stmPre = $conn->prepare($stm);
//print("stat is <P>$subArray</P>");
print_r($subArray);
$stmPre->execute($subArray);
$body = "<table><tr><th>ID</th>";
for($addTitle=0; $addTitle<count($infoGetsCheckboxes); $addTitle = $addTitle + 1){
	if($infoGetsCheckboxes[$addTitle] == "on"){
		$currAdd = $getCorrospondingName[$addTitle];
		$body = $body . "<th>$currAdd</th>";
	}
}
$body = $body . "</tr>";


foreach($stmPre->fetchAll(PDO::FETCH_ASSOC) as $key =>$val ) {
    $body = $body . "<tr><td>$key</td>";
	for($addTo=0; $addTo<count($infoGetsCheckboxes); $addTo = $addTo + 1){
		if($infoGetsCheckboxes[$addTo] == "on"){
			//print("<P>entered loop</P>");
			$toInsert = $val[$getCorrospondingName[$addTo]];
			//prev($toInsert);
			$body = $body . "<td>$toInsert</td>";
		}
	}
	$body .= "</td>\n";


    // $body .= "<tr><td>$key</td><td>" .
    //                $val['Title'] .
    //                //"</td><td>" . $val['salary'] . "</td><td>" . $val["dept_name"] .
	// 			   "</td></td>\n";
}
printPage($body, 1);


//$insSTMT->execute(array(':id'=>$ID, ':name'=>$name, ':dept'=>$dep, ':salary'=>$salary));

