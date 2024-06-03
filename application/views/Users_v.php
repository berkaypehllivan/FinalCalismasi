<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kullanıcı Ekleme</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Kullanıcı Ekleme</h2>
    <form action="<?php echo base_url('Users/save'); ?>" method="POST">
      <div class="mb-3">
        <label for="isim" class="form-label">İsim:</label>
        <input type="text" class="form-control" name="name" placeholder="İsim giriniz" value="<?php echo isset($form_error) ? set_value("name") : "" ?>">
        <?php if (isset($form_error)) { ?>
                          <small><?php echo form_error("name"); ?></small>
                        <?php } ?>
      </div>
      <div class="mb-3">
        <label for="soyisim" class="form-label">Soyisim:</label>
        <input type="text" class="form-control" name="surname" placeholder="Soyisim giriniz" value="<?php echo isset($form_error) ? set_value("surname") : "" ?>">
        <?php if (isset($form_error)) { ?>
                          <small><?php echo form_error("surname"); ?></small>
                        <?php } ?>
      </div>
      <div class="mb-3">
        <label for="sifre" class="form-label">Şifre:</label>
        <input type="password" class="form-control" name="password" placeholder="Şifre giriniz" value="<?php echo isset($form_error) ? set_value("password") : "" ?>">
        <?php if (isset($form_error)) { ?>
                          <small><?php echo form_error("password"); ?></small>
                        <?php } ?>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-posta:</label>
        <input type="email" class="form-control" name="email" placeholder="E-posta giriniz" value="<?php echo isset($form_error) ? set_value("email") : "" ?>">
        <?php if (isset($form_error)) { ?>
                          <small><?php echo form_error("email"); ?></small>
                        <?php } ?>
      </div>
      <button type="submit" class="btn btn-primary">Ekle</button>
      <a href="<?php echo base_url("Login")?>" class="btn btn-primary"> Çıkış Yap</a>
    </form>

    <h2 class="mt-5 mb-4">Kullanıcı Listesi</h2>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>E-posta</th>
          <th>İsim</th>
          <th>Soyisim</th>
          <th>Durum</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?php echo $user->id; ?></td>
          <td><?php echo $user->email; ?></td>
          <td><?php echo $user->name; ?></td>
          <td><?php echo $user->surname; ?></td>
          <td><?php echo $user->is_active == 0 ? "Pasif" : "Aktif"; ?></td>
          <td>
            <a href="<?php echo base_url("Users/delete/$user->id")?>" class="btn btn-danger btn-s"> Sil<i class="fas fa-trash"></i></a>
        </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
