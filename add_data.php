<?php
    include 'connect.php';
    include 'dataphp.php';

    for($i = 0; $i < count($userNames); $i++) {
        //Add data to user table
        $hashed_password = password_hash($passwords[$i], PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (userName, password) VALUE ('$userNames[$i]', '$hashed_password')";
        mysqli_query($conn, $sql);

        //Add data to cv table
        $sql = "INSERT INTO cv (fname, lname, title, gender, dob, location, objective, hobby, img) VALUE ('$fnames[$i]', '$lnames[$i]', '$titleOfCvs[$i]', '$genders[$i]', '$dateOfBirths[$i]', '$locations[$i]', '$objectives[$i]', '$hobbies[$i]', '$images[$i]')";
        mysqli_query($conn, $sql);

        //Add data to workexperience table
        $sql = "INSERT INTO workexperience (company, title, detail, startYear, endYear) VALUE ('$companys[$i]', '$titleOfWorkExps[$i]', '$detailOfWorkExps[$i]', '$tartYearofWorkExps[$i]', '$endYearofWorkExps[$i]')";
        mysqli_query($conn, $sql);

        //Add data to sociallink table
        $sql = "INSERT INTO sociallink (link) VALUE ('$socialLinks[$i]')";
        mysqli_query($conn, $sql);

        //Add data to phonenumber table
        $sql = "INSERT INTO phonenumber (numbers) VALUE ('$phoneNumbers[$i]')";
        mysqli_query($conn, $sql);

        //Add data to language table
        $sql = "INSERT INTO languages (lang) VALUE ('$languages[$i]')";
        mysqli_query($conn, $sql);

        //Add data to emailaddress table
        $sql = "INSERT INTO emailaddress (email) VALUE ('$emailAddresses[$i]')";
        mysqli_query($conn, $sql);

        //Add data to degree table
        $sql = "INSERT INTO degree (school, major, gpa, startYear, endYear) VALUE ('$schools[$i]', '$majors[$i]', '$gpas[$i]', '$startYearofDegrees[$i]', '$endYearofDegrees[$i]')";
        mysqli_query($conn, $sql);

        //Add data to certification table
        $sql = "INSERT INTO certification (year, detail) VALUE ('$yearOfCertifications[$i]', '$detailOfCertifications[$i]')";
        mysqli_query($conn, $sql);

        //Add data to award table
        $sql = "INSERT INTO award (year, detail) VALUE ('$yearOfAwards[$i]', '$detailOfAwards[$i]')";
        mysqli_query($conn, $sql);

        //Add data to activity table
        $sql = "INSERT INTO activity (title, detail, startYear, endYear) VALUE ('$titleOfActivities[$i]', '$detailOfActivities[$i]', '$startYearOfActivities[$i]', '$endYearOfActivities[$i]')";
        mysqli_query($conn, $sql);
    }

?>

