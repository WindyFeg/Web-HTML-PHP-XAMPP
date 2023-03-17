<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
  </head>
  <body>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?></h1>
    <p>Your user level is <?php echo $_SESSION['user_level']; ?></p>
    <!-- Display other information relevant to the user -->
    <a href="logout.php">Logout</a>
  </body>
</html>
