<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard <br>
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
                <!-- Profile Image -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <a href="<?= base_url('editProfile') ?>" class="btn btn-success">Edit
                            Profile</a>
                    </div>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                            src="<?= base_url('assets/upload/profile/').$account['image'] ?>"
                            alt="User profile picture">
                        <h3 class="profile-username text-center"><?= $account['name'] ?></h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>