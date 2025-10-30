<div class="sidebar">
  <div class="logo">
    <span>💊JJR MediTrack</span>
  </div>
  <hr>

  <?php
  // Dynamically change links based on role
if ($_SESSION['role'] == 'admin') {
    echo '
        <a href="admin_dashboard.php" class="active">🏠 Home</a>
        <a href="medicine_list.php">💊 Medicine</a>
        <a href="staff_list.php">👨‍⚕️ Staff</a>
        <a href="sales_record.php">📈 Sales</a>
        <a href="setting.php">⚙️ Settings</a>
    ';
} elseif ($_SESSION['role'] == 'staff') {
    echo '
        <a href="staff_dashboard.php" class="active">🏠 Home</a>
        <a href="medicine_list.php">💊 Medicine</a>
        <a href="setting.php">⚙️ Settings</a>
    ';
}
?>
</div>

