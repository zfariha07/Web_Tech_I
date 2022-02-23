<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>

	<h1>Registration Action</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
			$gender = test($_POST['gender']);
			$gender = test($_POST['gender']);
			$dob = test($_POST['Date_of_Birth']);
			$religion = test($_POST['Religion']);
			$present_address = test($_POST['present_address']);
			$permanent_address = test($_POST['permanent_address']);
			$phone_number = test($_POST['phone']);
			$email = test($_POST['email']);
			$personal_website_link = test($_POST['personal_website_link']);
			$username = test($_POST['username']);
			$password = test($_POST['user-password']);
			$password = test($_POST['user-password']);




			if (empty($firstname) or empty($lastname) or empty($gender) or empty($gender) or empty($dob) or empty($religion) or empty($present_address) or empty($permanent_address) or empty($phone_number) or empty($email) or empty($personal_website_link) or empty($username) or empty($password) or empty($password))
			 {
				echo "Please fill up the form";
			}
			else {
				define("FILENAME", "data.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME));
				$arr1 = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");
				if ($arr1 === NULL) {
					$id = 1;
					$data = array('id' => $id, 'firstname' => $firstname, 'lastname' => $lastname, 'gender'=> $gender, 'gender' => $gender, 'Date_of_Birth' =>$dob, 'Religion' => $religion, 'present_address'=> $present_address, 'permanent_address'=> $permanent_address, 'phone'=> $phone_number, 'email'=> $email, 'personal_website_link' => $personal_website_link, 'username' => $username, 'user-password' => $password, 'user-password' => $password );
					$data = json_encode($data);
					$fw = fwrite($handle, $data);
				}
				else {
					$id = $arr1[count($arr1) - 1]->id;
					$data = array('id' => $id + 1, 'firstname' => $firstname, 'lastname' => $lastname, 'gender'=> $gender, 'gender' => $gender, 'Date_of_Birth' => $dob, 'Religion' => $religion, 'present_address'=> $present_address, 'permanent_address'=> $permanent_address, 'phone'=> $phone_number, 'email'=> $email, 'personal_website_link' => $personal_website_link, 'username' => $username, 'user-password' => $password, 'user-password' => $password);
					$arr1[] = $data;
					$data = json_encode($arr1);
					$fw = fwrite($handle, $data);
				}
				$fc = fclose($handle);

				if ($fw) {
					echo "<h3>Data Added Successfully</h3>";
				}

			}

		}
	?>

	<a href="Registration_Form.html">Create User</a>

</body>
</html>