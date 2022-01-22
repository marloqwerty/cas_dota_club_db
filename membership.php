<!-- Object Oriented Php -->

<?php

class Membership
{
   private $conn;
   function __construct()
   {
      session_start();

      // Create connection
      // mysqli(servername, username, password, database_name,)
      $conn = new mysqli("localhost", "root", "", "cas_dota_club");

      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      } else {
         $this->conn = $conn;
      }
   }


   /***** Function Members *****/
   // Selecting all data in the "Crud" Database
   public function member_list()
   {

      $sql = "SELECT members.member_id, members.member_name, course.course_name, members.email_address, members.ign, main_position.main_position_name FROM members inner join main_position on members.main_position_id = main_position.main_position_id inner join course on members.course_id = course.course_id ORDER BY member_id asc";

      $result =  $this->conn->query($sql);
      return $result;
   }

   // function/method to Create in [C]RUD
   // Create new information
   public function create($post_data = array())
   {

      if (isset($post_data['create_member'])) {
         $member_name = mysqli_real_escape_string($this->conn, trim($post_data['member_name']));

         $course_id = mysqli_real_escape_string($this->conn, trim($post_data['course_id']));


         $email_address = mysqli_real_escape_string($this->conn, trim($post_data['email_address']));

         $ign = mysqli_real_escape_string($this->conn, trim($post_data['ign']));

         $main_position_id = mysqli_real_escape_string($this->conn, trim($post_data['main_position_id']));

         $sql = "INSERT INTO members (member_name, course_id, email_address, ign, main_position_id) VALUES ('$member_name', '$course_id', '$email_address', '$ign','$main_position_id')";

         $result =  $this->conn->query($sql);

         if ($result) {
            $_SESSION['message'] = "Action Completed Successfully";
            header('Location: index.php');
         } else {
         }
         unset($post_data['create_member']);
      }
   }


   //function/method to READ in C[R]UD
   // Read information
   public function read($id)
   {
      if (isset($id)) {
         $member_id = mysqli_real_escape_string($this->conn, trim($id));
         $sql = "SELECT members.member_id, members.member_name, course.course_id, members.email_address, members.ign, main_position.main_position_name FROM members inner join main_position on members.main_position_id = main_position.main_position_id  inner join course on members.course_id = course.course_id where member_id='$member_id'";
         $result =  $this->conn->query($sql);
         return $result->fetch_assoc();
      }
   }

   //function/method to UPDATE in CR[U]D
   // Update information
   public function update($post_data = array())
   {
      if (isset($post_data['update']) && isset($post_data['id'])) {
         $member_name = mysqli_real_escape_string($this->conn, trim($post_data['member_name']));

         $course_id = mysqli_real_escape_string($this->conn, trim($post_data['course_id']));

         $email_address = mysqli_real_escape_string($this->conn, trim($post_data['email_address']));

         $ign = mysqli_real_escape_string($this->conn, trim($post_data['ign']));

         $main_position_id = mysqli_real_escape_string($this->conn, trim($post_data['main_position_id']));

         $member_id = mysqli_real_escape_string($this->conn, trim($post_data['id']));

         $sql = "UPDATE members SET member_name='$member_name',
         course_id='$course_id',
         email_address='$email_address',ign='$ign',main_position_id='$main_position_id' WHERE member_id =$member_id";
         $result =  $this->conn->query($sql);
         if ($result) {
            $_SESSION['message'] = "Action Completed Successfully";
         }
         unset($post_data['update']);
      }
   }
   //function/method to DELETE in CRU[D]
   // Delete Information
   public function delete($id)
   {
      if (isset($id)) {

         $member_id = mysqli_real_escape_string($this->conn, trim($id));
         $sql = "DELETE FROM  members  WHERE member_id =$member_id";
         $result =  $this->conn->query($sql);
         if ($result) {
            $_SESSION['message'] = "Action Completed Successfully";
         }
      }
      header('Location: index.php');
   }
}
