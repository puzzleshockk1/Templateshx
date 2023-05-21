<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.authpro.com/auth/majsinan/?action=pp">
</script>
<head>
  <title>All Customers</title>
  <style>
    table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>
<body>
  <h2>All Customers</h2>
  <table>
    <thead>
      <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Username</th>
        <th class="text-center">Email</th>
        <th class="text-center">Name</th>
        <th class="text-center">Hashed Pass</th>
        <th class="text-center">Coins</th>
        <th class="text-center">Update Coins(Nedela)</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['coins']) && isset($_POST['user_id'])) {
          $coins = $_POST['coins'];
          $user_id = $_POST['user_id'];
          
          $update_sql = "UPDATE users SET coins = $coins WHERE id = $user_id";
          $update_result = $conn->query($update_sql);
          
          if ($update_result) {
            echo '<p>Coins updated successfully!</p>';
          } else {
            echo '<p>Error updating coins.</p>';
          }
        }
      }
      
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
      $count = 1;
      
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["id"]?></td>
      <td><?=$row["fname"]?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["password"]?></td>
      <td><?=$row["coins"]?></td>
      <td>
        <form method="post">
          <input type="number" name="coins" min="0" value="<?=$row['coins']?>" required>
          <input type="hidden" name="user_id" value="<?=$row['id']?>">
          <input type="submit" value="Update">
        </form>
      </td>
    </tr>
    <?php
          $count++;
        }
      } else {
        // Handle case when no rows are returned or query execution error
        echo '<tr><td colspan="7">No customers found</td></tr>';
      }
      $conn->close(); // Close the database connection
    ?>
  </table>
</body>
</html>
