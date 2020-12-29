  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Page Header
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
                          <form action="<?= base_url('add') ?>" method="POST">
                              <div class="box-body">
                                  <div class="form-group <?= form_error('name')? 'has-error': '' ?>">
                                      <label for="name">Nama</label>
                                      <input type="text" class="form-control" placeholder="Masukkan nama anda" value="<?= set_value('name') ?>" name="name" id="name">
                                      <span class="small text-danger" style="margin-left: 10px"><?= form_error('name') ?></span>
                                  </div>
                                  <div class="form-group <?= form_error('email')? 'has-error': '' ?>">
                                      <label for="name">Email</label>
                                      <input type="email" class="form-control" placeholder="Masukkan email anda" value="<?= set_value('email') ?>" name="email" id="email">
                                      <span class="small text-danger" style="margin-left: 10px"><?= form_error('email') ?></span>
                                  </div>
                                  <div class="form-group <?= form_error('address')? 'has-error': '' ?>">
                                      <label for="name">Alamat</label>
                                      <input type="text" class="form-control" placeholder="Masukkan alamat anda" value="<?= set_value('address') ?>" name="address" id="address">
                                      <span class="small text-danger" style="margin-left: 10px"><?= form_error('address') ?></span>
                                  </div>
                                  <div class="form-group">
                                      <label for="selectInput">Select</label>
                                      <?php $val = 3 ?>
                                      <select name="selectInput" id="selectInput">
                                          <option disabled <?= ($val == NULL)? 'selected' : '' ?>>-- Select Pilihan --
                                          </option>
                                          <option value="1" <?= ($val == 1)? 'selected' : '' ?>>Yes</option>
                                          <option value="2" <?= ($val == 2)? 'selected' : '' ?>>No</option>
                                          <option value="3" <?= ($val == 3)? 'selected' : '' ?>>Yes No</option>
                                      </select>
                                      <span class="small text-danger" style="margin-left: 10px"><?= form_error('address') ?></span>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputDate">Date</label>
                                      <div class="input-group date">
                                          <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" id="inputDate">
                                      </div>
                                  </div>
                              </div>
                              <div class="div-footer">
                                  <a href="<?= base_url('admin') ?>" class="btn btn-default">Kembali</a>
                                  <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>