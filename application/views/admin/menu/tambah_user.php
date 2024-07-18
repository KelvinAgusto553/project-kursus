  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>General Form</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">General Form</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!-- left column -->
              <!-- general form elements -->
              <div class="card card-black">
                  <div class="card-header">
                      <h3 class="card-title">Quick Example</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="<?= base_url('admin/insert_user') ?>" enctype="multipart/form-data">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Masukan Username">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <label for="">Role</label>
                              <select name="role" class="form-control">
                                <option value="#">-- PILIH ROLE --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputFile">File input</label>
                              <div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="upload_image" id="exampleInputFile">
                                      <label class="custom-file-label" for="upload_image">Choose file</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
              <!-- /.card -->