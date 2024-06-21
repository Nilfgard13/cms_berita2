<?php
require __DIR__ . '/../../src/bootstrap.php';
require_login();
?>

<?php view('header_in', ['title' => 'View post']) ?>

<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand brand-logo" href="../dashboard_admin.php"><img src="../../src/assets/images/logo.svg" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="../dashboard_admin.php"><img src="../../src/assets/images/logo-mini.svg" alt="logo" /></a>
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
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
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
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tabel Artikel</h4>
                <p class="card-description">Daftar artikel yang telah diterbitkan</p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Judul Artikel</th>
                        <th>Tema Artikel</th>
                        <th>Nama Penulis</th>
                        <th>ISI</th>
                        <th>Gambar</th>

                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      try {
                        $pdo = db();
                        $stmt = $pdo->query('SELECT * FROM artikel');
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo '<tr>';
                          echo '<td>' . htmlspecialchars($row['judul_artikel']) . '</td>';
                          echo '<td>' . htmlspecialchars($row['tema_artikel']) . '</td>';
                          echo '<td>' . htmlspecialchars($row['nama_penulis']) . '</td>';
                          echo '<td>' . htmlspecialchars(substr(strip_tags($row['isi']), 0, 45)) . '... </td>';
                          echo '<td><img src="uploads/' . htmlspecialchars($row['gambar']) . '" alt="gambar" /></td>';
                          echo '<td>';
                          echo '<button class="btn btn-primary btn-sm edit-btn" data-id="' . htmlspecialchars($row['id_artikel']) . '" data-judul="' . htmlspecialchars($row['judul_artikel']) . '" data-tema="' . htmlspecialchars($row['tema_artikel']) . '" data-penulis="' . htmlspecialchars($row['nama_penulis']) . '" data-isi="' . htmlspecialchars($row['isi']) . '">Edit</button>';
                          echo ' <button class="btn btn-danger btn-sm delete-btn" data-id="' . htmlspecialchars($row['id_artikel']) . '">Delete</button>';
                          echo '</td>';
                          echo '</tr>';
                        }
                      } catch (PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Edit -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Artikel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="id_artikel" id="edit-id">
                <div class="form-group">
                  <label for="edit-judul">Judul Artikel</label>
                  <input type="text" class="form-control" id="edit-judul" name="judul_artikel">
                </div>
                <div class="form-group">
                  <label for="edit-tema">Tema Artikel</label>
                  <input type="text" class="form-control" id="edit-tema" name="tema_artikel">
                </div>
                <div class="form-group">
                  <label for="edit-penulis">Nama Penulis</label>
                  <input type="text" class="form-control" id="edit-penulis" name="nama_penulis">
                </div>
                <div class="form-group">
                  <label for="edit-isi">Isi</label>
                  <textarea class="form-control" id="edit-isi" name="isi"></textarea>
                </div>
                <div class="form-group">
                  <label for="edit-gambar">Gambar</label>
                  <input type="file" class="form-control" id="edit-gambar" name="gambar">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete Artikel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="deleteForm" method="POST">
              <div class="modal-body">
                <input type="hidden" name="id_artikel" id="delete-id">
                <p>Are you sure you want to delete this artikel?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../../src/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../src/assets/js/off-canvas.js"></script>
<script src="../../src/assets/js/hoverable-collapse.js"></script>
<script src="../../src/assets/js/misc.js"></script>
<script src="../../src/assets/js/settings.js"></script>
<script src="../../src/assets/js/todolist.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script type="text/javascript">
  $(document).ready(function() {
    // Edit button click
    $('.edit-btn').on('click', function() {
      $('#edit-id').val($(this).data('id'));
      $('#edit-judul').val($(this).data('judul'));
      $('#edit-tema').val($(this).data('tema'));
      $('#edit-penulis').val($(this).data('penulis'));
      $('#edit-isi').val($(this).data('isi'));
      $('#editModal').modal('show');
    });

    // Delete button click
    $('.delete-btn').on('click', function() {
      $('#delete-id').val($(this).data('id'));
      $('#deleteModal').modal('show');
    });

    // Edit form submit
    $('#editForm').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: 'edit.php', // Make sure this path is correct
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {
          if (response.trim() === 'success') {
            location.reload();
          } else {
            alert('Error: ' + response);
          }
        }
      });
    });

    $('#deleteForm').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: 'delete.php', // Updated to delete.php
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          if (response.trim() === 'success') {
            location.reload();
          } else {
            alert('Error: ' + response);
          }
        }
      });
    });
  });
</script>

<!-- End custom js for this page -->
</body>

</html>