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
if (isset($_GET["id"])) {
  $member_details = $object->read($_GET["id"]);
} else {
  header("Location: index.php");
}
?>
<div class="container-lg">

  <div class="container-fluid">

    <h3>Information</h3>
    <hr />
    <div class="card text-dark bg-light mb-3" style="width: 500px" ;>
      <div class="card-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Name:</td>
              <td>
                <?php if (isset($member_details["member_name"])) {
                  echo $member_details["member_name"];
                } ?>
              </td>
            </tr>
            <tr>
              <td>Id:</td>
              <td>
                <?php if (isset($member_details["member_id"])) {
                  echo $member_details["member_id"];
                } ?>
              </td>
            </tr>
            <tr>
              <td>Email address:</td>
              <td><?php if (isset($member_details["email_address"])) {
                    echo $member_details["email_address"];
                  } ?>
              </td>
            </tr>

            <tr>
              <td>IGN:</td>
              <td><?php if (isset($member_details["ign"])) {
                    echo $member_details["ign"];
                  } ?>
              </td>
            </tr>
            <tr>
              <td>Main Position:</td>
              <td> <?php if (isset($member_details["main_position_name"])) {
                      echo $member_details["main_position_name"];
                    } ?>

              </td>
            </tr>



          </tbody>
        </table>
        <a href=" index.php" class="btn btn-primary">Back</a>

        <a href="<?php echo "update-func.php?id=" . $member_details["member_id"]; ?>" class="btn btn-primary">Update</a>
      </div>
    </div>
  </div>
</div>



</html>