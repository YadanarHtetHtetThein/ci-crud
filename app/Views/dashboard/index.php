<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Dashboard
    <table>
        <tr>
            <td>Name</td>
            <td>Email</td>
        </tr>
        <tr>
            <td><?= $member['name'] ; ?></td>
            <td><?= $member['email'] ; ?></td>
        </tr>
    </table>
    <a href="<?= site_url('auth/logout');?>">Logout</a>
</body>
</html>