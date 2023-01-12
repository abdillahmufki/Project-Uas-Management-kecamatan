<?php
  $segment = current_url(true)->getSegment(2);
?>
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link <?= ($segment === "dashboard") ? '' : 'collapsed' ?>" href="<?= base_url('admin/dashboard') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link <?= ($segment === "aparat") ? '' : 'collapsed' ?> " href="<?=base_url('admin/aparat')?>">
          <i class="bi bi-person"></i>
          <span>Aparat</span>
        </a>
      </li>

    <li class="nav-item">
      <a class="nav-link <?= (current_url(true)->getSegment(2) == "inventaris") ? '' : 'collapsed' ?> " href="<?= base_url('admin/inventaris') ?>">
        <i class="bi bi-archive"></i>
        <span>Inventarisasi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= ($segment === "tanah") ? '' : 'collapsed' ?> " href="<?=base_url('admin/tanah')?>">
        <i class="bi bi-person"></i>
        <span>Data Tanah</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= ($segment === "keputusan-camat") ? '' : 'collapsed' ?> " href="<?= base_url('admin/keputusan-camat') ?>">
        <i class="bi bi-journals"></i>
        <span>Keputusan Camat</span>
      </a>
    </li>

    <?php if (in_groups('admin')) : ?>
    <li class="nav-item">
      <a class="nav-link <?= ($segment === "users") ? '' : 'collapsed' ?> " href="<?= base_url('admin/users') ?>">
        <i class="bi bi-person"></i>
        <span>User Management</span>
      </a>
    </li>

    <?php endif; ?>

  </ul>

</aside>

<script>
  $(".ul li").addClass('collapsed');
  var urlType = document.URL.split("/");
  $("a[href*='/" + urlType + "']").removeClass("collapsed"); // contains /players
</script>