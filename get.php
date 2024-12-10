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

  print("<h1>art matching your Querry $year</h1>\n");

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


$stm = $stm . ";";
$stmPre = $conn->prepare($stm);
print("stat is <P>$stm<P");
$stmPre->execute($subArray);
 $body = "<table><tr><th>ID</th><th>Name</th><th>salary</th><th>department</th></tr>";
 foreach($stmPre->fetchAll(PDO::FETCH_ASSOC) as $key =>$val ) {
	$body .= "<tr><td>$key</td>";
	for($addTo=0; $addTo<count($infoGetsCheckboxes); $addTo = $addTo + 1){
		if(isset($infoGetsCheckboxes[$addTo])){
			$toInsert = $val[$getCorrospondingName[$addTo]];
			$body .= "<tr>$toInsert</tr>";
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

