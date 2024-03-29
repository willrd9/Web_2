<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php'; 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }

    if (strpos($email, '@vt.edu') == FALSE)
	{
		$error_msg .= '<p class="error">The email address you entered is not from VT</p>';

	}
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
        $error_msg .= '<p class="error">Database error</p>';
    }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
	//Create validation code
 	$confirm_code=md5(uniqid(rand())); 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, confirm) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssss', $username, $email, $password, $random_salt, $confirm_code);
	
$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject
$body = '

Thanks for signing up '.$username.'!
Your account has been created, you can login after you click the link below:

http://ec2-54-84-123-58.compute-1.amazonaws.com/verify.php?email='.$email.'&hash='.$confirm_code.'

'; // Our message above including the link


mail($to, $subject, $body, null, '-fno_reply@DDme.com');




	
	

           // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}
}
