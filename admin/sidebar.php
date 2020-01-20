
<div class="span-4 last">
  <div>
    <ul class="markermenu">
      <?php if ($_SESSION['m1']=='home') { ?>
      <li class="<?php if ($_SESSION['m2']=='dashboard') { echo "active"; } else { echo "" ;}?>" ><a href="index.php">Dashboard</a></li>
      <?php } ?>
      <?php if ($_SESSION['m1']=='content') { ?>
      <li class="<?php if ($_SESSION['m2']=='category-list') { echo "active"; } else { echo "" ;}?>" ><a href="category-list.php">Categor&iacute;as</a></li>
      <li class="<?php if ($_SESSION['m2']=='page-list') { echo "active"; } else { echo "" ;}?>" ><a href="page-list.php">P&aacute;ginas</a></li>
      <?php } ?>
      <?php if ($_SESSION['m1']=='banner') { ?>
      <li class="<?php if ($_SESSION['m2']=='banner-list') { echo "active"; } else { echo "" ;}?>" ><a href="banner-list.php">Banners</a></li>
      <?php } ?>
    </ul>
  </div>
</div>
<div class="span-19 last content" >
