<?php
require __DIR__ . '/../../src/bootstrap.php';
// require __DIR__ . '/../../src/Addpost.php';
require_login();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   // Collect and sanitize input data
//   $nama = trim($_POST['nama']);
//   $email = trim($_POST['email']);
//   $gender = trim($_POST['gender']) === 'Male' ? 'pria' : 'wanita';
//   $alamat = trim($_POST['alamat']);
//   $judul = trim($_POST['judul']);
//   $tema = trim($_POST['tema']);
//   $isi = trim($_POST['editor1']);

//   // Handle file upload
//   $gambar = '';
//   if (!empty($_FILES['img']['name'][0])) {
//     $uploadDir = 'uploads/';
//     $uploadFile = $uploadDir . basename($_FILES['img']['name'][0]);
//     if (move_uploaded_file($_FILES['img']['tmp_name'][0], $uploadFile)) {
//       $gambar = basename($_FILES['img']['name'][0]);
//     } else {
//       echo "Failed to upload image.";
//       exit;
//     }
//   }

//   // Get the user ID from the session
//   $id_users = $_SESSION['user_id'];

//   // Prepare the SQL statement
//   $pdo = db(); // Get an instance of PDO
//   $sql = "INSERT INTO artikel (id_users, nama_penulis, email, gender, alamat_penulis, judul_artikel, gambar, tema_artikel, isi, jumlah_dikunjungi) 
//             VALUES (:id_users, :nama_penulis, :email, :gender, :alamat_penulis, :judul_artikel, :gambar, :tema_artikel, :isi, 0)";

//   try {
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindParam(':id_users', $id_users, PDO::PARAM_INT);
//     $stmt->bindParam(':nama_penulis', $nama, PDO::PARAM_STR);
//     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//     $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
//     $stmt->bindParam(':alamat_penulis', $alamat, PDO::PARAM_STR);
//     $stmt->bindParam(':judul_artikel', $judul, PDO::PARAM_STR);
//     $stmt->bindParam(':gambar', $gambar, PDO::PARAM_STR);
//     $stmt->bindParam(':tema_artikel', $tema, PDO::PARAM_STR);
//     $stmt->bindParam(':isi', $isi, PDO::PARAM_STR);

//     if ($stmt->execute()) {
//       echo "Data has been saved successfully.";
//       header('Location: addPost.php'); // Redirect to the view post page
//       exit;
//     } else {
//       $error = "Failed to save data. Error: " . $stmt->errorInfo()[2];
//       echo "<script>alert('$error');</script>";
//     }
//   } catch (PDOException $e) {
//     $error = "Error: " . $e->getMessage();
//     echo "<script>alert('$error');</script>";
//   }
// }
?>


<?php view('header_in', ['title' => 'Add post']) ?>

<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand brand-logo" href="../dashboard_admin.php"><img src="../../src/assets/images/logo.svg"
          alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="../dashboard_admin.php"><img
          src="../../src/assets/images/logo-mini.svg" alt="logo" /></a>
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
          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="mdi mdi-email-outline"></i>
            <span class="count-symbol bg-warning"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0">Messages</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../../src/assets/images/faces/face4.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                <p class="text-gray mb-0"> 1 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../../src/assets/images/faces/face2.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                <p class="text-gray mb-0"> 15 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../../src/assets/images/faces/face3.jpg" alt="image" class="profile-pic">
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
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
            data-bs-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            <span class="count-symbol bg-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
            aria-labelledby="notificationDropdown">
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
          <a class="nav-link" href="../logout.php">
            <i class="mdi mdi-power"></i>
          </a>
        </li>
        <li class="nav-item nav-settings d-none d-lg-block">
          <a class="nav-link" href="#">
            <i class="mdi mdi-format-line-spacing"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <!--Side Nav Bar-->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="nav-profile-image">
              <img src="../../src/assets/images/faces/face1.jpg" alt="profile" />
              <span class="login-status online"></span>
              <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2"><?php echo $_SESSION['username']; ?></span>

              <span class="text-secondary text-small">Admin</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../dashboard_admin.php">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addPost.php">
            <span class="menu-title">Add post</span>
            <i class="fa fa-pencil menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewPost.php">
            <span class="menu-title menu-icon">View post</span>
            <i class="fa fa-eye menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Accounts.php">
            <span class="menu-title">Accounts</span>
            <i class="fa fa-address-book menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <span class="menu-title">Logout</span>
            <i class="fa fa-power-off menu-icon"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="fa fa-pencil"></i>
            </span> Add post
          </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="col-12 grid-margin">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Data Penulis</h4>
                  <p class="card-description"> Masukkan Data Penulis </p>

                    
                  <!-- Form -->
                  <form class="forms-sample" action="add_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama Penulis</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Alamat Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                      <select class="form-select" id="Gender" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Alamat Penulis</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat penulis">
                    </div>
                    <h4 class="card-title">Form Artikel</h4>
                    <p class="card-description"> Buat artikel anda disini </p>
                    <div class="form-group">
                      <label for="exampleInputCity1">Judul Artikel</label>
                      <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Gambar</label><br>

                      <input type="file" name="img" id="exampleInputFile" class="form-control-file">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tema Artikel</label>
                      <select class="form-select" name="tema">
                        <option value="Sosial">Sosial</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Politik">Politik</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Olah raga">Olah raga</option>
                        <option value="Kesehatan">Kesehatan</option>
                      </select>
                    </div>
                    <!-- Make sure you have the right CKEditor 5 script -->
                    <div class="form-group">
                      <input id="x" type="hidden" name="content" value="" />
                      <trix-editor input="x"></trix-editor>
                      <!-- <input type="submit" name="submit" value="Submit" /> -->
                    </div>


                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a
              href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
              class="mdi mdi-heart text-danger"></i></span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

<script>
  function getCleanText() {
    var htmlContent = document.getElementById('x').value;
    var cleanText = htmlContent.replace(/<\/?[^>]+(>|$)/g, ""); // Remove HTML tags
    console.log(cleanText); // Use the clean text as needed
  }
</script>

<?php view('footer_in') ?>