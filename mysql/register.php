<?php

    // Run configuration code to connection to the database & start a session
    require("includes/config.php");

    // Checks to see if form has been submitted -- If it has, then the registration code is run, otherwise the form is displayed
    if(!empty($_POST)){
        // Ensure that the user has entered a non-empty username
        if(empty($_POST['username']))
        {
            // quick and dirty for testing
            die("Please enter a username.");
        }

        // Ensure that the user has entered a non-empty password
        if(empty($_POST['password'])){
            // quick and dirty for testing
            die("Please enter a password.");
        }

        // // Make sure the user entered a valid E-Mail address
        // if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        //     // quick and dirty for testing
        //     die("Invalid E-Mail Address");
        // }

        // Check to see if username is in use.
        $query = " SELECT 1 FROM users WHERE username = :username";

        // Prevent SQL injection exploits by using tokens
        $query_params = array(
            ':username' => $_POST['username']
        );

        try{
            // run the query
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // quick and dirty for testing
            die("Failed to run query: " . $ex->getMessage());
        }

        // Returns an array representing the "next" row from the selected results, or false if there are no more rows to fetch.
        $row = $stmt->fetch();

        // If a row was returned, then we know a matching username was found in the database already
        if($row)
        {
            // quick and dirty for testing
            die("This username is already in use");
        }

        // // Now we perform the same type of check for the email address, in order to ensure that it is unique.
        // $query = "SELECT 1 FROM users WHERE email = :email";

        // $query_params = array(
        //     ':email' => $_POST['email']
        // );

        // try{
        //     $stmt = $db->prepare($query);
        //     $result = $stmt->execute($query_params);
        // }
        // catch(PDOException $ex){
        //     // quick and dirty for testing
        //     die("Failed to run query: " . $ex->getMessage());
        // }

        // $row = $stmt->fetch();

        // if($row){
        //     // quick and dirty for testing
        //     die("This email address is already registered");
        // }

        // An INSERT query is used to add new rows to a database table.
        $query = "INSERT INTO users (
                username,
                password,
                salt,
                -- email
                ) VALUES (
                    :username,
                    :password,
                    :salt,
                    -- :email
                )";

        // Generates a hex representation of an 8 byte salt.
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

        // Hashes the password with the salt so that it can be stored securely in your database.  The output of this next statement is a 64 byte hex string representing the 32 byte sha256 hash of the password.
        $password = hash('sha256', $_POST['password'] . $salt);

        // Next we hash the hash value 65536 more times.
        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        }

        // Prepare our tokens for insertion into the SQL query. Store the salt (in its plaintext form; this is not a security risk).
        $query_params = array(
            ':username' => $_POST['username'],
            ':password' => $password,
            ':salt' => $salt,
            // ':email' => $_POST['email']
        );

        try{
            // Execute the query to create the user
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex){
            // quick and dirty for testing
            die("Failed to run query: " . $ex->getMessage());
        }

        // Redirects the user back to the login page after they register
        header("Location: index.php?action=login#secondPage#");

        // quick and dirty for testing
        die("Redirecting to login.php");
    }

?>
