<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();

// Fungsi untuk mengambil semua artikel dari database
function fetch_all_articles()
{
  $pdo = db();
  $stmt = $pdo->prepare("SELECT * FROM artikel ORDER BY updated_at DESC");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Mengambil data artikel
$articles = fetch_all_articles();

?>

<?php view('header_admin', ['title' => 'Dashboard']) ?>
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand brand-logo" href="index.html"><img src="../src/assets/images/logo.svg" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../src/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-email-outline"></i>
            <span class="count-symbol bg-warning"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0">Messages</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../src/assets/images/faces/face4.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                <p class="text-gray mb-0"> 1 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../src/assets/images/faces/face2.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                <p class="text-gray mb-0"> 15 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../src/assets/images/faces/face3.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                <p class="text-gray mb-0"> 18 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="p-3 mb-0 text-center">4 new messages</h6>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            <span class="count-symbol bg-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <h6 class="p-3 mb-0">Notifications</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="mdi mdi-calendar"></i>
                </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="mdi mdi-cog"></i>
                </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                <p class="text-gray ellipsis mb-0"> Update dashboard </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <i class="mdi mdi-link-variant"></i>
                </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                <p class="text-gray ellipsis mb-0"> New admin wow! </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="p-3 mb-0 text-center">See all notifications</h6>
          </div>
        </li>
        <li class="nav-item nav-logout d-none d-lg-block">
          <a class="nav-link" href="logout.php">
            <i class="mdi mdi-power"></i>
          </a>
        </li>
        <li class="nav-item nav-settings d-none d-lg-block">
          <a class="nav-link" href="#">
            <i class="mdi mdi-format-line-spacing"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper align-self-center">
    <!-- partial:partials/_sidebar.html -->
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row mb-4">
          <div class="col-12">
            <h2 class="welcome-message">Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
          </div>
        </div>
        <div class="row">
          <?php foreach ($articles as $article) : ?>
            <div class="col-md-4">
              <div class="card">
                <img class="card-img-top" src="admin/uploads/<?php echo htmlspecialchars($article['gambar']); ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"> Judul Artikel : <?php echo htmlspecialchars($article['judul_artikel']); ?></h5>
                  <p class="card-text"> Penulis : <?php echo htmlspecialchars(substr($article['nama_penulis'], 0, 100)) . '...'; ?></p>
                  <p class="card-text"> Email : <?php echo htmlspecialchars(substr($article['email'], 0, 100)) . '...'; ?></p>
                  <p class="card-text"> Alamat : <?php echo htmlspecialchars(substr($article['alamat_penulis'], 0, 100)) . '...'; ?></p>
                  <p class="card-text"> Tema Artikel : <?php echo htmlspecialchars(substr($article['tema_artikel'], 0, 100)) . '...'; ?></p>
                  <p class="card-text"> Deskripsi : <?php echo htmlspecialchars(substr($article['isi'], 0, 100)) . '...'; ?></p>
                  <a href="artikel_detail.php?id_artikel=<?php echo $article['id_artikel']; ?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<style>
  .container-fluid.page-body-wrapper {
    display: flex;
    flex-direction: column;
    height: 100vh;
    width: 100vw;
    padding: 0;
    margin: 0;
  }

  .main-panel {
    flex: 1;
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .content-wrapper {
    flex: 1;
    padding: 2rem;
    overflow-y: auto;
    width: 100%;
  }

  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .card-title {
    font-size: 1.25rem;
    font-weight: bold;
  }

  .card-text {
    color: #555;
  }

  .navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
  }

  .footer {
    background: #f8f9fa;
    padding: 1rem 0;
    width: 100%;
  }
</style>

<?php view('footer_admin') ?>