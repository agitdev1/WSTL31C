<?php
function renderSidebar($activePage) {
    $menuItems = [
        'dashboard' => 'User Dashboard',
        'leaderboard' => 'Volunteer Leaderboard',
        'history' => 'My History',
        'profile' => 'Profile',
        'account' => 'Account',
        'logout' => 'Logout'
    ];
    echo '<div class="sidebar"><ul class="menu">';
    foreach ($menuItems as $page => $title) {
        $activeClass = ($page === $activePage) ? 'active' : '';
        echo "<li class='menu-item $activeClass'><a href='{$page}.php'>$title</a></li>";
    }
    echo '</ul></div>';
}
?>