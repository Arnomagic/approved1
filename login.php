<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style type="text/css">

    <?php include("css.css"); ?>

</style>
<section class="vh-100" style="background-color: #219C90;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">เข้าสู่ระบบ</h3>
            <hr class="my-4">
        <form class="form-login" action="cklogin.php" method="post">
            <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" name="username" placeholder="ชื่อผู้ใช้" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2"></label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" name="password" placeholder="รหัสผ่าน" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2"></label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">เข้าสู่ระบบ</button>
        </form>
        <hr class="my-4">
            <button  onclick="window.location.href='register.php';" class="btn btn-primary btn-lg btn-block" type="submit">สมัครสมาชิก</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>