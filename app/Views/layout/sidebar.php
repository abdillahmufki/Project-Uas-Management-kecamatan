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
      <a class="nav-link <?= (current_url(true)->getSegment(2) == "aparat") ? '' : 'collapsed' ?> " href="<?= base_url('aparat') ?>">
        <i class="bi bi-person"></i>
        <span>Aparat</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= (current_url(true)->getSegment(2) == "keputusan-camat") ? '' : 'collapsed' ?> " href="<?= base_url('keputusan-camat') ?>">
        <i class="bi bi-journals"></i>
        <span>Keputusan Camat</span>
      </a>
    </li>

    <?php if (in_groups('admin')) : ?>
    <li class="nav-item">
      <a class="nav-link <?= (current_url(true)->getSegment(3) == "users") ? '' : 'collapsed' ?> " href="<?= base_url('admin/users') ?>">
        <i class="bi bi-person"></i>
        <span>User Management</span>
      </a>
    </li>

    <?php endif; ?>

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>End Profile Page Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>End F.A.Q Page Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>End Contact Page Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>End Register Page Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>End Login Page Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li>End Error 404 Page Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li>End Blank Page Nav -->

  </ul>

</aside>

<script>
  $(".ul li").addClass('collapsed');
  var urlType = document.URL.split("/");
  $("a[href*='/" + urlType + "']").removeClass("collapsed"); // contains /players
</script>