<?php

if((!empty($_POST['formPName'])&&!empty($_POST['formSpecies'])&&!empty($_POST['formPhone'])&&!empty($_POST['dissapearanceDate'])&&isset($_POST['found'])) 
||(!empty($_POST['lat'] && !empty($_POST['long'])))) {
    $id = $_POST['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'lost_pets');

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $edit_ad = "select `name`,breed,disappearance_date,marks,collar,last_seen_place,last_modify_date,picture,details,owner,phone,mail,reward,`found` from ads where id=?";
    $stmt = $conn->prepare($edit_ad);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $breed, $disappearance_date, $marks, $collar, $last_seen_place, $last_modify_date, $picture, $details, $owner, $phone, $mail, $reward, $found);
    $stmt->fetch();
    $stmt->close();
    $formPName=$_POST['formPName'];
    $formSpecies=$_POST['formSpecies'];
    $dissapearanceDate=$_POST['dissapearanceDate'];
    $moreDetails=$_POST['moreDetails'];
    $formMarks=$_POST['formMarks'];
    $formCollar=$_POST['formCollar'];
    $lastSeen=$_POST['lastSeen'];
    $foundP=$_POST['found'];
    $lastPlace=$_POST['lat'] . " ".$_POST['long'];
    $formPhone=$_POST['formPhone'];
    $formReward=$_POST['formReward'];
    $imageName=$_FILES['formPImage']['name'][0];

    //echo $imageName;


    echo $lastPlace;
    die;

    $current_date = date("Y-m-d");

    if ($current_date < $dissapearanceDate || $lastSeen>$current_date ) {
        echo "<script>alert('Dissapearance date or last seen date is invalid!')</script>";
        echo "<script>location.href='../edit.php?id=$id'</script>";
    }

    else { if ($imageName) {

        if ($name != $formPName || $breed != $formSpecies || $disappearance_date != $dissapearanceDate
            || $marks != $formMarks || $collar = $formCollar || $last_modify_date != $lastSeen ||
                $details != $moreDetails || $found != $foundP || $phone != $formPhone ||
                $reward != $formReward || $picture != $imageName || $lastPlace != $last_seen_place) {

            $sql = "UPDATE ads SET phone='" . $formPhone . "' , name='" . $formPName . "' , picture='" . $imageName . "',breed='" . $formSpecies . "',
         disappearance_date='" . $dissapearanceDate . "',marks='" . $formMarks . "',collar='" . $formCollar . "',last_seen_place='" . $lastPlace . "',last_modify_date='" . $lastSeen . "',
         details='" . $moreDetails . "',reward='" . $formReward . "', found='" . $foundP . "' WHERE id=?";
            $query = $conn->prepare($sql);
            $query->bind_param('s', $id);
            $query->execute();


            if ($query->error) {
                echo "FAILURE!!! " . $stmt->error;
            }

            $uploads_dir = "../Front/images";

            foreach ($_FILES["formPImage"]["error"] as $key => $value) {
                if ($value == UPLOAD_ERR_INI_SIZE) {
                    echo "Uploaded file is too big.";
                    die;
                }

                if ($value == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["formPImage"]["tmp_name"][$key];
                    $name = basename($_FILES["formPImage"]["name"][$key]);
                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                } else {
                    echo "File not uploaded. Erorr";
                }
            }
            $query->close();
            $url = '../ad.php?id=' . $id;

            header("Location:$url");

        }
    }
    else {
        if ($name != $formPName || $breed != $formSpecies || $disappearance_date != $dissapearanceDate
            || $marks != $formMarks || $collar = $formCollar || $last_modify_date != $lastSeen ||
                $details != $moreDetails || $found != $foundP || $phone != $formPhone ||
                $reward != $formReward  || $lastPlace != $last_seen_place) {

            $sql = "UPDATE ads SET phone='" . $formPhone . "' , name='" . $formPName . "' ,breed='" . $formSpecies . "',
         disappearance_date='" . $dissapearanceDate . "',marks='" . $formMarks . "',collar='" . $formCollar . "',last_seen_place='" . $lastPlace . "',last_modify_date='" . $lastSeen . "',
         details='" . $moreDetails . "',reward='" . $formReward . "', found='" . $foundP . "' WHERE id=?";
            $query = $conn->prepare($sql);
            $query->bind_param('s', $id);
            $query->execute();

            $query->close();
            $url = '../ad.php?id=' . $id;

            header("Location:$url");
        }
    }
}
}
