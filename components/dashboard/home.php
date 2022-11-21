<div class="dashboard__home">
    <!-- prettier-ignore -->
    <div class="dashboard__entry-list">
        <span>Entry list</span>
        <div class="dashboard__itemContent">
            <?php include '../scripts/php/dashboard_show_entries.php'; ?>
        </div>
    </div>

    <div class="dashboard__users">
        <svg class="dashboard__icon">
            <use xlink:href="../img/icons/symbol-defs.svg#icon-users"></use>
        </svg>
        <span>Users</span>
        <div class="dashboard__itemContent">
            <?php include '../scripts/php/dashboard_show_users.php'; ?>
        </div>
    </div>


    <div class="dashboard__smallitem dashboard__settings">
        <svg class="dashboard__icon">
            <use xlink:href="../img/icons/symbol-defs.svg#icon-tool"></use>
        </svg>
        <span>Settings</span>
    </div>


    <div class="dashboard__smallitem dashboard__add-entry">
        <svg class="dashboard__icon">
            <use xlink:href="../img/icons/symbol-defs.svg#icon-archive"></use>
        </svg>
        <span>Add entry</span>
    </div>


    <div class="dashboard__smallitem dashboard__edit-entry">
        <svg class="dashboard__icon">
            <use xlink:href="../img/icons/symbol-defs.svg#icon-edit-3"></use>
        </svg>
        <span>Entry edit</span>
    </div>


    <div class="dashboard__analytics">
        <svg class="dashboard__analyticsIcon">
            <use xlink:href="../img/icons/symbol-defs.svg#icon-trending-up"></use>
        </svg>
        <span>Analytics</span>
    </div>
</div>