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
    <div class="search-icon"></div>	<!-- <div class="search-insert"></div> -->
</div>