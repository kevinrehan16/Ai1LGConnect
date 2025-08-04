<!-- SIDEBAR -->
<?php
  $profileStat = 'active';
  if (!isset($_GET['url']) || explode('/', $_GET['url'])[0] !== 'profilelist'){
    $profileStat = '';
  }
?>

<section id="sidebar">
  <a href="javascript::void(0)" class="brand">
    <i class='icon bx bxs-church'></i> GCF<small style="font-weight: 200;">SouthMetro</small>
  </a>
  <ul class="side-menu">
    <li>
      <a href="<?=ROOT_PUBLIC?>/" class="<?php echo !isset($_GET['url']) || ($_GET['url'] === 'home') ? 'active' : ''; ?>"><i class='icon bx bxs-dashboard'></i> Dashboard</a>
    </li>
    <li class="divider" data-text="Main Navigation">Main Navigation</li>
    <li>
      <a href="<?=ROOT_PUBLIC?>/profilelist/<?php echo $_SESSION['memberDefaultId']; ?>" class="<?php echo $profileStat; ?>"><i class='icon bx bxs-user-detail'></i> Profile</a>
    </li>
    <li>
      <a href="javascript:void(0)" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'memberlist' || $_GET['url'] === 'newmemberslist' || $_GET['url'] === 'pastorslist' || $_GET['url'] === 'elderlist'  || $_GET['url'] === 'deaconlist') ? 'active' : ''; ?>"><i class='icon bx bxs-group'></i> Members <i class='icon bx bxs-chevron-right icon-right'></i></a>
      <ul class="side-dropdown <?php echo isset($_GET['url']) && ($_GET['url'] === 'memberlist' || $_GET['url'] === 'newmemberslist' || $_GET['url'] === 'pastorslist' || $_GET['url'] === 'elderlist'  || $_GET['url'] === 'deaconlist') ? 'show' : ''; ?>">
        <li><a href="<?=ROOT_PUBLIC?>/memberlist" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'memberlist') ? 'active' : ''; ?>">All Members</a></li>
        <!-- <li><a href="<?=ROOT_PUBLIC?>/newmemberslist" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'newmemberslist') ? 'active' : ''; ?>">New Members</a></li> -->
        <li><a href="<?=ROOT_PUBLIC?>/pastorslist" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'pastorslist') ? 'active' : ''; ?>">Pastoral Staff</a></li>
        <li><a href="<?=ROOT_PUBLIC?>/elderlist" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'elderlist') ? 'active' : ''; ?>">Elders</a></li>
        <li><a href="<?=ROOT_PUBLIC?>/deaconlist" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'deaconlist') ? 'active' : ''; ?>">Deacons</a></li>
      </ul>
    </li>
    <li>
      <a href="<?=ROOT_PUBLIC?>/hierarchy" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'hierarchy') ? 'active' : ''; ?>"><i class='icon bx bx-shape-triangle'></i> Disciple Network</a>
    </li>
    <li>
      <a href="javascript:void(0)" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'clustermembers' || $_GET['url'] === 'growthgroupmembers') ? 'active' : ''; ?>"><i class='icon bx bx-table'></i> Group Members <i class='icon bx bxs-chevron-right icon-right'></i></a>
      <ul class="side-dropdown <?php echo isset($_GET['url']) && ($_GET['url'] === 'clustermembers' || $_GET['url'] === 'growthgroupmembers') ? 'show' : ''; ?>">
        <li><a href="<?=ROOT_PUBLIC?>/clustermembers" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'clustermembers') ? 'active' : ''; ?>">Clusters</a></li>
        <li><a href="<?=ROOT_PUBLIC?>/growthgroupmembers" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'growthgroupmembers') ? 'active' : ''; ?>">Growth Groups</a></li>
        <li><a href="javascript:void(0);">GGLi Class</a></li>
      </ul>
    </li>
    <li class="divider" data-text="Referentials">Referentials </li>
    <li>
      <a href="<?=ROOT_PUBLIC?>/churchlist" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'churchlist') ? 'active' : ''; ?>"><i class='icon bx bx-church'></i> Church Satellites</a>
    </li>
    <li>
      <a href="javascript:void(0)" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'usersaccounts' || $_GET['url'] === 'clustersgroup' || $_GET['url'] === 'growthgroup') ? 'active' : ''; ?>"><i class='icon bx bx-cog'></i> Group Setup <i class='icon bx bxs-chevron-right icon-right'></i></a>
      <ul class="side-dropdown <?php echo isset($_GET['url']) && ($_GET['url'] === 'usersaccounts' || $_GET['url'] === 'clustersgroup' || $_GET['url'] === 'growthgroup') ? 'show' : ''; ?>">
        <li><a href="<?=ROOT_PUBLIC?>/usersaccounts" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'usersaccounts') ? 'active' : ''; ?>">Users Accounts</a></li>
        <li><a href="<?=ROOT_PUBLIC?>/clustersgroup" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'clustersgroup') ? 'active' : ''; ?>">Clusters Group</a></li>
        <li><a href="<?=ROOT_PUBLIC?>/growthgroup" class="<?php echo isset($_GET['url']) && ($_GET['url'] === 'growthgroup') ? 'active' : ''; ?>">Growth Group</a></li>
        <li><a href="javascript:void(0);">GGLi</a></li>
      </ul>
    </li>
  </ul>
  <!-- <div class="ads">
    <div class="wrapper">
      <a href="javascript::void(0)" class="btn-upgrade">Upgrade</a>
      <p>Become a <span>PRO</span> member and enjoy <span>All Features</span></p>
    </div>
  </div> -->
</section>
<!-- END SIDEBAR -->