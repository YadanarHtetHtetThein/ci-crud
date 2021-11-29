<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?= base_url('auth/login'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif; ?>
                    <?php if(!empty(session()->getFlashdata('success'))): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">
                        <small class="text-danger"><?= isset($validation)? display_error($validation,'email'):''; ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <small class="text-danger"><?= isset($validation)? display_error($validation,'password'):''; ?></small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Login</button>
                    </div>
                    <a href="<?= site_url('auth/register') ?>">Have no account, crete new account</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>