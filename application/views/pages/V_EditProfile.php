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
                        <?php echo form_open_multipart(base_url('editProfile'));?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#" class="thumbnail">
                                        <img src="<?= base_url('assets/upload/profile/'.$account['image']) ?>" id="foto-profile" alt="Image Thumbnail">
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <input type="hidden" name="id" value="<?= $account['id'] ?>">
                                    <div class="form-group <?= (form_error('name')? 'has-error' : '') ?>" style="margin-top: 25px">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $account['name'] ?>">
                                        <div class="text-danger small"><?= form_error('name') ?></div>
                                    </div>
                                    <div class="form-group <?= (form_error('email')? 'has-error' : '') ?>">
                                        <label for="name">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $account['email'] ?>" readonly>
                                        <div class="text-danger small"><?= form_error('email') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-image">Foto Profile</label>
                                        <input type="file" name="profile-image" id="profile-image">
                                        <input type="hidden" name="old-image" id="old-image" value="<?= ($account['image'] == NULL)? 'default.png' : $account['image'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="div-footer">
                            <a href="<?= base_url('profile') ?>" class="btn btn-default">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>