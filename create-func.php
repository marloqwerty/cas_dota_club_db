<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAS Dota Club Members</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- list of library of assets -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/style.css?<?php echo time(); ?>" />

</head>

<body>
    <?php
    include 'membership.php';
    $object = new Membership();
    ?>

</html>

<?php
if (isset($_POST['create_member'])) {
    $object->create($_POST);
}
?>
<div class="container-lg">
    <div class="container-fluid">
        <!-- <a href="index.php" class="button pull-right">See List</a> -->
        <h3>Create New Member Information</h3>
        <hr />
        <form method="post" action="">
            <div class="mb-3">
                <label for="member_name" class="form-label">Name:</label>
                <input type="text" name="member_name" id="member_name" class="form-control" required maxlength="50">
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Course:</label>
                <select class="form-control" name="course_id" id="course_id">
                    <option value="1" selected>AB English Language</option>
                    <option value="2">AB Communication</option>
                    <option value="3">BA Sociology</option>
                    <option value="4">BS Biology</option>
                    <option value="5">BS Computer Science</option>
                    <option value="6">BSIT</option>
                    <option value="7">BS Math</option>
                    <option value="8">BS Meteorology</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="em
                ail_address" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" required maxlength="50">
            </div>
            <div class="mb-3">
                <label for="ign" class="form-label">IGN:</label>
                <input type="text" name="ign" id="ign" class="form-control" maxlength="100">
            </div>

            <div class="mb-3">
                <label for="main_position_id" class="form-label">Main Position:</label>
                <select class="form-control" name="main_position_id" id="main_position_id">
                    <option value="1" selected>Carry</option>
                    <option value="2">Ganker, Solo</option>
                    <option value="3">Offlaner</option>
                    <option value="4">Jungler</option>
                    <option value="5">Support</option>
                </select>
            </div>
            <a href="index.php" class="btn btn-primary">Back</a>

            <input type="submit" class="btn btn-primary" name="create_member" value="Submit" />
        </form>
    </div>
</div>
<hr />