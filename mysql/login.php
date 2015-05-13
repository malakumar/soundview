<?php

    // Run configuration code to connection to the database & start a session
    require("includes/config.php");

    // Re-display the user's username to them in the login form if they fail to enter the correct password.  It is initialized here to an empty value, which will be shown if the user has not submitted the form.
    $submitted_username = '';

    // Checks to determine whether the login form has been submitted If it has, then the login code is run, otherwise the form is displayed
    if(!empty($_POST))
    {
        // Retreives the user's information from the database using their username.
        $query = "SELECT
                id,
                username,
                password,
                salt,
                -- email
            FROM users
            WHERE
                username = :username";

        // The parameter values
        $query_params = array(
            ':username' => $_POST['username']
        );

        try{
            // Execute the query against the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex){
            // quick and dirty for testing
            die("Failed to run query: " . $ex->getMessage());
        }

        // This variable tells us whether the user has successfully logged in or not. false - not logged in
        $login_ok = false;

        // Retrieve the user data from the database.  If $row is false, then the username they entered is not registered.
        $row = $stmt->fetch();
        if($row){
        // check passwords with hash
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            }

            if($check_password === $row['password']){
                // If they do, then we flip this to true
                $login_ok = true;
            }
        }

        // Login succed - private members-only page
        if($login_ok){
            // Here I am preparing to store the $row array into the $_SESSION by removing the salt and password values from it.  Although $_SESSION is stored on the server-side, there is no reason to store sensitive values in it unless you have to.  Thus, it is best practice to remove these sensitive values first.
            unset($row['salt']);
            unset($row['password']);

            // This stores the user's data into the session at the index 'user'. We will check this index on the private members-only page to determine whether or not the user is logged in.  We can also use it to retrieve the user's details.
            $_SESSION['user'] = $row;

            // Redirect the user to the private members-only page.
            header("Location: index.php?action=login#secondPage");
            // quick and dirty for testing
            die("Redirecting to: home.php");
        } else {
            // if their login fails
            print("Login Failed.");

            // Use of htmlentities to prevent XSS attacks.
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
        }
    }
    ?>
