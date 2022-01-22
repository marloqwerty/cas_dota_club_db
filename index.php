<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAS Dota Club Members</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <?php
    // include 'header.php';
    $member_list = $object->member_list();
    ?>
    <div class="container-lg">
        <div class="container-fluid">


            <?php
            if (isset($_SESSION['message'])) {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION["message"] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_SESSION['message']);
            }
            ?>



            <table class="table table-striped sticky-top">
                <thead style="position: sticky; top: 0; background: white;">
                    <tr class="">
                        <th colspan="5">
                            <h3>CAS Dota Club Members</h3>
                        </th>
                        <th>
                            <a href="create-func.php" class="btn btn-primary btn-lg" role="button">
                                Create</a>
                        </th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>In-Game-Name(IGN)</th>
                        <th>Main Position</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($member_list->num_rows > 0) {
                        while ($row = $member_list->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row["member_name"] ?></td>

                                <td><?php echo $row["course_name"] ?></td>

                                <td><?php echo $row["email_address"] ?></td>

                                <td><?php echo $row["ign"] ?></td>

                                <td><?php echo $row["main_position_name"] ?></td>

                                <td class="btn-group-sm">
                                    <a href="<?php echo 'delete-func.php?id=' . $row["member_id"] ?>" class="btn btn-primary button-red btn-sm " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" role="button"><i class="material-icons md-18">delete_outline</i></a>

                                    <a href="<?php echo 'update-func.php?id=' . $row["member_id"] ?>" class="btn btn-primary button-blue btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" role="button"><span class="material-icons-outlined">
                                            edit
                                        </span></a>
                                    <a href="<?php echo 'read-func.php?id=' . $row["member_id"] ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View" role="button"><span class="material-icons-outlined">
                                            visibility
                                        </span></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>