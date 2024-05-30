<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Registrasi</title>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <link rel="stylesheet" href="styleregist.css">
</head>

<body>
          <div class="container mt-5">
                    <div class="row justify-content-center">
                              <div class="col-md-6">
                                        <div class="card">
                                                  <div class="card-header">Registrasi</div>
                                                  <img src="logo.jpg" alt="logo" width="100" height="100" class="centered-img">
                                                  <div class="card-body">
                                                            <form action="script_register.php" method="POST">
                                                                      <div class="form-group">
                                                                                <label for="username">Username</label>
                                                                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                                                                      </div>
                                                                      <div class="form-group">
                                                                                <label for="no_hp">No HP</label>
                                                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan no HP" required>
                                                                      </div>
                                                                      <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                                                                      </div>
                                                                      <div class="form-group">
                                                                                <label for="password">Password</label>
                                                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                                      </div>
                                                                      <div class="form-group">
                                                                                <label for="confirm_password">Konfirmasi Password</label>
                                                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password" required>
                                                                      </div>
                                                                      <button type="submit" class="btn btn-primary">Daftar</button>
                                                            </form>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </div>
</body>

</html>