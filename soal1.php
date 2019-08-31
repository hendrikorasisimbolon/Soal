<?php
// Fungsi Memambahkan List School
function tambahSc($name, $year_in, $yerar_out,$major){
	if($major == ''){
		$major = null;
	}
	$data = [
		'name'=>$name,
		'year_in'=>$year_in,
		'year_out'=>$yerar_out,
		'major'=>$major
	];
	return $data;
}

// Fungsi Menambahkan Skill
function tambahSk($skillname,$level)
{
	$skills = array(
	[
		'skillname' => $skillname,
		'level' => $level
	]);
	return $skills;
}


$name = "Hendri Korasi Simbolon";
$age = 23;
$address = "Jl. Ramunia 1 Desa Ramunia 1 Kec. Pantai Labu Kab. Deli Serdang";
$hobbies = ["Playing Games", "Listening Music"];
$is_married = false;
$list_school = [];
$skills = [];
$interest_in_coding = true;

$list_school[0]= tambahSc("SMKN 1 BERINGIN", 2011, 2014,'Teknik Komputer dan Jaringan');
$list_school[1]= tambahSc("STMIK MIKROSKIL MEDAN", 2015, 2019,'Teknik Informatika');
$skills[0] = tambahSk("Javascript","Beginner");
$skills[1] = tambahSk("PHP","Beginner");
$skills[2] = tambahSk("Kotlin Android","Beginner");

// Menampilkan JSON Biodata
function biodata($name,$age,$address,$hobbies,$is_married,$list_school,$skills,$interest_in_coding){
	$data = array(
		'name' => $name,
		'age' => $age,
		'hobbies' => $hobbies,
		'is_married' => $is_married,
		'list_school' => $list_school,
		'skills' => $skills,
		'interest_in_coding' => $interest_in_coding
	);
	echo json_encode($data);
}
biodata($name,$age,$address,$hobbies,$is_married,$list_school,$skills,$interest_in_coding);
