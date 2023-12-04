<?php
    include 'connect.php';
    include 'dataphp.php';

    for($i = 0; $i < count($userNames); $i++) {
        //Add data to user table
        $hashed_password = password_hash($passwords[$i], PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (userName, password) VALUE ('$userNames[$i]', '$hashed_password')";
        mysqli_query($conn, $sql);

        //Add data to cv table
        $sql = "INSERT INTO cv (fname, lname, title, gender, dob, location, objective, hobby, img, userID) VALUE ('$fnames[$i]', '$lnames[$i]', '$titleOfCvs[$i]', '$genders[$i]', '$dateOfBirths[$i]', '$locations[$i]', '$objectives[$i]', '$hobbies[$i]', '$images[$i]', '$userIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to workexperience table
        $sql = "INSERT INTO workexperience (company, title, detail, startYear, endYear, cvID) VALUE ('$companys[$i]', '$titleOfWorkExps[$i]', '$detailOfWorkExps[$i]', '$tartYearofWorkExps[$i]', '$endYearofWorkExps[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to sociallink table
        $sql = "INSERT INTO sociallink (link, cvID) VALUE ('$socialLinks[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to phonenumber table
        $sql = "INSERT INTO phonenumber (numbers, cvID) VALUE ('$phoneNumbers[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to language table
        $sql = "INSERT INTO languages (lang, cvID) VALUE ('$languages[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to emailaddress table
        $sql = "INSERT INTO emailaddress (email, cvID) VALUE ('$emailAddresses[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to degree table
        $sql = "INSERT INTO degree (school, major, gpa, startYear, endYear, cvID) VALUE ('$schools[$i]', '$majors[$i]', '$gpas[$i]', '$startYearofDegrees[$i]', '$endYearofDegrees[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to certification table
        $sql = "INSERT INTO certification (year, detail, cvID) VALUE ('$yearOfCertifications[$i]', '$detailOfCertifications[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to award table
        $sql = "INSERT INTO award (year, detail, cvID) VALUE ('$yearOfAwards[$i]', '$detailOfAwards[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);

        //Add data to activity table
        $sql = "INSERT INTO activity (title, detail, startYear, endYear, cvID) VALUE ('$titleOfActivities[$i]', '$detailOfActivities[$i]', '$startYearOfActivities[$i]', '$endYearOfActivities[$i]', '$cvIDs[$i]')";
        mysqli_query($conn, $sql);
    }

?>

