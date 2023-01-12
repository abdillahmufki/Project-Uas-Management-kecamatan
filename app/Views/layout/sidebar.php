<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link <?= (current_url(true)->getSegment(2) == "dashboard") ? '' : 'collapsed' ?>" href="<?= base_url('/dashboard') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link <?= (current_url(true)->getSegment(2) == "aparat") ? '' : 'collapsed' ?> " href="<?=base_url('aparat')?>">
          <i class="bi bi-person"></i>
          <span>Aparat</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= (current_url(true)->getSegment(2) == "inventaris") ? '' : 'collapsed' ?> " href="<?=base_url('inventaris')?>">
          <i class="bi bi-archive"></i>
          <span>Inventarisasi</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
      <li class="nav-item">
        <a class="nav-link <?= (current_url(true)->getSegment(2) == "tanah") ? '' : 'collapsed' ?> " href="<?=base_url('tanah')?>">
          <i class="bi bi-person"></i>
          <span>Data Tanah</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (current_url(true)->getSegment(2) == "keputusan-camat") ? '' : 'collapsed' ?> " href="<?= base_url('keputusan-camat') ?>">
          <i class="bi bi-journals"></i>
          <span>Keputusan Camat</span>
        </a>
      </li>

  </ul>

</aside>

<script>
  $(".ul li").addClass('collapsed');
  var urlType = document.URL.split("/");
  $("a[href*='/" + urlType + "']").removeClass("collapsed"); // contains /players
</script>