<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        DataTable with minimal features & hover style
      </h3>
      <a href="<?= base_url('admin/tambah_user'); ?>" class="btn btn-success btn-sm float-right">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kurus</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($kursuss as $kursus) { ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $kursus['nama_kursus']; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->