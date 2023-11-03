<div class="header">
    <div class="user-icon" onclick="location.href='/assignment/src/user.php'"></div>
    <?php if($user == 1) { ?>
        <a class="header-a" href="/assignment/src/list.php/?user=<?php echo $user; ?>">짱구는 못말려</a>
    <?php } else if($user == 2) { ?>
        <a class="header-b" href="/assignment/src/list.php?user=<?php echo $user; ?>">철수는 못말려</a>
    <?php } else if($user == 3) { ?>
        <a class="header-c" href="/assignment/src/list.php?user=<?php echo $user; ?>">맹구는 못말려</a>
    <?php } else if($user == 4) { ?>
        <a class="header-d" href="/assignment/src/list.php?user=<?php echo $user; ?>">유리는 못말려</a>
    <?php } ?>
    <button type="button" class="search-icon" data-bs-toggle="modal" data-bs-target="#searchModal"></button>
    <div class="header-insert-btn" onclick="location.href='/assignment/src/insert.php/?user=<?php echo $user; ?>'"></div>

    <!-- <button id="open-header-modal-btn" class="search-icon"></button>
    <div id="header-modal-id" class="header-modal">
        <div class="header-modal-content">
            <form action="">
                <input class="search-modal-input" type="text">
                <button class="search-icon"></button>
            </form>
        </div>
    </div>
    <script src="/assignment/src/js/assignment.js"></script> -->

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-header-maxwidth">
    <div class="modal-content modal-hedaer-option">
      <div class="modal-body">
        <form action="/assignment/src/list.php" method="GET">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <input name="search" class="search-modal-input" type="text">
            <button class="search-icon"></button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>