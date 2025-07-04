    <?php
      include_once "connection.php";
      if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }
    ?>
    <div class="main">
  <aside class="sidebar">
    <nav class="menu">
      <a href="enquiry.php"><i class="icon">📩</i><span>Enquiries</span></a>
      <a href="booking.php"><i class="icon">📘</i><span>Bookings</span></a>
      <a href="reviews.php"><i class="icon">⭐</i><span>Reviews</span></a>

      <div class="menu-group">
        <button class="dropdown-toggle"><i class="icon">📄</i><span>Pages</span></button>
        <div class="submenu">
          <a href="contact.php">Contact Page</a>
        </div>
      </div>

      <div class="menu-group">
        <button class="dropdown-toggle"><i class="icon">🏡</i><span>Villas</span></button>
        <div class="submenu">
          <a href="addvilla.php">Add Villa</a>
          <a href="viewvilla.php">View Villas</a>
        </div>
      </div>

      <div class="menu-group">
        <button class="dropdown-toggle"><i class="icon">❓</i><span>FAQs</span></button>
        <div class="submenu">
          <a href="addfaq.php">Add FAQ</a>
          <a href="viewfaq.php">View FAQs</a>
        </div>
      </div>

      <div class="menu-group">
        <button class="dropdown-toggle"><i class="icon">🖼️</i><span>Gallery</span></button>
        <div class="submenu">
          <a href="addgallery.php">Add Gallery</a>
          <a href="viewgallery.php">View Gallery</a>
        </div>
      </div>
    </nav>
  </aside>
  <div class="blanknav2"></div>
</div>
  <script>
  document.querySelectorAll('.dropdown-toggle').forEach(button => {
    button.addEventListener('click', () => {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    });
  });
</script>
