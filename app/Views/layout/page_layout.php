<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendorAsset/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendorAsset/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendorAsset/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendorAsset/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendorAsset/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendorAsset/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendorAsset/simple-datatables/style.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
		<?= $this->include('layout/header')?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
		<?= $this->include('layout/sidebar')?>
  <!-- End Sidebar-->

  <main id="main" class="main">
		<div class="pagetitle">
			<?= $this->renderSection('page-title') ?>
		</div>
    <section class="section dashboard">
			<?= $this->renderSection('content') ?>
		</section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
		<?= $this->include('layout/footer')?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendorAsset/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/chart.js/chart.umd.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/echarts/echarts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/quill/quill.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendorAsset/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>

</html>