<?php include "starter/header.php"; ?>
<body>
  <nav>
    <div class="nav-bar">
      <div class="first-menu">
        <div class="logo">
          <a href="index.php">KGB Team</a>
        </div>
        <div class="nav-bar-link">
          <a href="templates/index.php">Home</a>
          <a href="templates/login.php">Account</a>
        </div>
      </div>
      <div class="second-menu">
        <div class="search_box">
          <input type="search" name="search" class="search">
          <button type="submit" class="submit-btn"><i class="fas fa-search"></i></span></button>
        </div>
      </div>
    </div>
  </nav>
  <section class="body-container">
    <div class="kgb_members">
      <div class="kgb_members_header">
        <h2>our actual members</h2>
      </div>
      <div class="user">
        <div class="user-data">
          <img src="img/j.png" alt="username - profile pic">
          <div class="user-data_names">
            <p class="fullname">full name</p>
            <p class="username">@username</p>
          </div>
        </div>
        <div class="link">
          <a href="#">his diary</a>
        </div>
      </div>

      <div class="user">
        <div class="user-data">
          <img src="img/j.png" alt="username - profile pic">
          <div class="user-data_names">
            <p class="fullname">full name</p>
            <p class="username">@username</p>
          </div>
        </div>
        <div class="link">
          <a href="#">his diary</a>
        </div>
      </div>

      <div class="user">
        <div class="user-data">
          <img src="img/j.png" alt="username - profile pic">
          <div class="user-data_names">
            <p class="fullname">full name</p>
            <p class="username">@username</p>
          </div>
        </div>
        <div class="link">
          <a href="#">his diary</a>
        </div>
      </div>

      <div class="user">
        <div class="user-data">
          <img src="img/j.png" alt="username - profile pic">
          <div class="user-data_names">
            <p class="fullname">full name</p>
            <p class="username">@username</p>
          </div>
        </div>
        <div class="link">
          <a href="#">his diary</a>
        </div>
      </div>


    </div>
    <div class="recent_post">
      <h2>recent post from membersssss</h2>
    </div>
  </section>

<?php include "starter/footer.php"; ?>