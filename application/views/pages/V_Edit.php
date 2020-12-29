  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Edit User Profile
              <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
              <li class="active">Here</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="box box-primary box-solid">
                      <div class="col-lg-8">
                          <form id="form-edit">
                              <div class="box-body">
                                  <div class="form-group <?= form_error('name')? 'has-error' : '' ?>">
                                      <label for="name">Nama</label>
                                      <input type="text" class="form-control" placeholder="Masukkan nama anda"
                                          value="<?= $user['name'] ?>" name="name" id="name">
                                      <span class="small text-danger" style="margin-left: 10px"><?= form_error(
                                          	'name'
                                          ) ?></span>
                                  </div>
                                  <div class="form-group <?= form_error('email')? 'has-error' : '' ?>">
                                      <label for="name">Email</label>
                                      <input type="email" class="form-control" placeholder="Masukkan email anda" value="<?= $user[
                                          	'email'
                                          ] ?>" name="email" id="email">
                                      <span class="small text-danger"
                                          style="margin-left: 10px"><?= form_error('email') ?></span>
                                  </div>
                                  <div class="form-group <?= form_error('address')? 'has-error'
                                  	: '' ?>">
                                      <label for="name">Alamat</label>
                                      <input type="text" class="form-control" placeholder="Masukkan alamat anda"
                                          value="<?= $user['address'] ?>" name="address" id="address">
                                      <span class="small text-danger"
                                          style="margin-left: 10px"><?= form_error(	'address') ?></span>
                                  </div>
                              </div>
                              <div class="div-footer">
                                  <a href="<?= base_url('admin') ?>" class="btn btn-default">Kembali</a>
                                  <button type="button" class="btn btn-primary btn-update"
                                      data-id="<?= $user['id'] ?>">Update</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>