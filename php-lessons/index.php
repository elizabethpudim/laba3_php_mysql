<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>


<?php 

class User
{
	public $name = "Liza";
	public $surname = "Pudim";
	public $bday = "1997-11-21";


	public function dispName(){
		echo "Full Name: {$this->name} {$this->surname} <br>" ;
	}
	
	public function dispBDay(){
		echo "Birthday: {$this->bday} <br>";
	}
	public function age(){
		$dob = new DateTime($this->bday); //date of birth
		$now = new DateTime();
		$difference = $now->diff($dob);
		$age = $difference->y;
		echo "Age: {$age} <br>";
	}
	public function set_name($new_name){
		$this->name = $new_name;
	}
	public function set_surname($new_surname){
		$this->surname = $new_surname;
	}
}

$Liza = new User();
$Liza->set_name("Melissa");
$Liza->dispName();
$Liza->set_surname("Frolova");
$Liza->dispName();
$Liza->age();


class Student extends User
{
	public $facFBulty = "IPT";
	public $cafedra = "Cyber";
	public $group = "FB-74";

	public function year(){
		echo "Year of enrollment: 201".$this->group{3}."<br>";

	}
	public function subgroup(){
		echo "Subgroup: ".$this->group{4};
	}
}	

$Bodya = new Student();
$Bodya->set_name("Bodya");
$Bodya->set_surname("Pytaichuk");
$Bodya->dispName();
$Bodya->year();
$Bodya->subgroup();


 ?>
	
</body>
</html>