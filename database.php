<?php 

	session_start();

	//Initialize variables
	$first_name = "";
	$last_name = "";
	$student_no = "";
	$gender = "";
	$email = "";
	$date_of_birth = "";
	$id = 0;
	$edit_state = false;

	//Connect to database
	$con = mysqli_connect("localhost","root","","lis161_crud");

	if (!$con) {
		echo "Connection to database unsuccessful!";
	} else {
		echo "Connection to database successful!";
	}

	//Create record
	if (isset($_POST['submit'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$student_no = $_POST['student_no'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$date_of_birth = $_POST['date_of_birth'];

		$query = "INSERT INTO students(first_name,last_name,student_no,gender,email,date_of_birth) VALUES ('$first_name','$last_name','$student_no','$gender','$email','$date_of_birth')";

		mysqli_query($con,$query);
		header("location: index.php");
	}

	//Read records
	$student_records = mysqli_query($con,"SELECT * FROM students");

	//UPDATE record
	if (isset($_POST['update'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$student_no = $_POST['student_no'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$date_of_birth = $_POST['date_of_birth'];
		$id = $_POST['id'];

		$query = "UPDATE students SET
		first_name = '$first_name',
		last_name = '$last_name',
		student_no = '$student_no',
		gender = '$gender',
		email = '$email',
		date_of_birth ='$date_of_birth',
		WHERE id=$id";

		//Perform query
		mysqli_query($con,$query);

		//Set status message
		$_SESSION['message'] = "Student record updated";

		//Redirect to homepage
		header("location: index.php");
	}

	//DELETE record
	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		//Prepare query
		$query = "DELETE FROM students WHERE id=$id";

		//Perform query
		mysqli_query($con,$query);

		//Set status message
		$_SESSION['message'] = "Student record deleted";

		//Redirect to homepage
		header("location: index.php");

	}
 ?>