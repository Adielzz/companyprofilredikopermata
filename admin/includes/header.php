<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);

// Sidebar-Menu structure -->
$menuItems = [
    [
        "menuTitle" => "User",
        "icon" => "fa-solid fa-user-gear",
        "pages" => [
            ["title" => "Admin", "url" => "index.php"],
            ["title" => "User Settings", "url" => "user.php"],
        ],
    ],
    [
        "menuTitle" => "Notifications",
        "icon" => "fa-solid fa-bell",
        "pages" => [
            ["title" => "Messages", "url" => "messages.php"],
        ],
    ],
    [
        "menuTitle" => "Home",
        "icon" => "fa-solid fa-house",
        "pages" => [
            ["title" => "Banner", "url" => "banner.php"],
            ["title" => "Features", "url" => "features.php"],
        ],
    ],
    [
        "menuTitle" => "About Us",
        "icon" => "fa fa-info-circle",
        "pages" => [
            ["title" => "About Us", "url" => "about.php"],
            ["title" => "Statistics", "url" => "statistics.php"],
        ],
    ],
    [
        "menuTitle" => "Services",
        "icon" => "fa fa-briefcase",
        "pages" => [
            ["title" => "Our Services", "url" => "ourServices.php"],
            ["title" => "Services", "url" => "services.php"],
        ],
    ],
    [
        "menuTitle" => "Products",
        "icon" => "fa fa-shopping-bag",
        "pages" => [
            ["title" => "Product Categories", "url" => "category.php"],
            ["title" => "All Products", "url" => "products.php"],
        ],
    ],
    [
        "menuTitle" => "Contact",
        "icon" => "fa-solid fa-address-book",
        "pages" => [
            ["title" => "Contact Information", "url" => "contact.php"],
        ],
    ]
];

$activePageInfo = array_reduce($menuItems, function ($carry, $menuItem) use ($currentPage) {
    foreach ($menuItem['pages'] as $page) {
        if ($currentPage === $page['url']) {
            return [
                "breadcrumbItems" => [
                    ["title" => $menuItem['menuTitle'], "url" => "#"],
                    ["title" => $page['title'], "url" => $page['url']]
                ],
                "pageTitle" => $page['title'],
                "activeMenu" => $menuItem,
                "activePage" => $page
            ];
        }
    }
    return $carry;
}, null);

$breadcrumbItems = $activePageInfo['breadcrumbItems'] ?? [];
$pageTitle = $activePageInfo['pageTitle'] ?? '';
$activeMenu = $activePageInfo['activeMenu'] ?? null;
$activePage = $activePageInfo['activePage'] ?? null;
$message_count = (new Database())->eQuery("SELECT COUNT(*) AS no_checked_count FROM messages WHERE status = 'no_checked';")[0]['no_checked_count'] ?? 0;
?>

<title><?= $pageTitle ?></title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block"><a href="./" class="nav-link">Home</a></li>
    </ul>
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" name="search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown"><a class="nav-link" href="./messages.php"><i class="far fa-comments"></i><span
                    class="badge badge-danger navbar-badge"><?= $message_count ?></span></a></li>
    </ul>
</nav>

<div class="main-header" style="padding: 0px 10px; background-color: #f4f6f9; border-bottom: none !important;">
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $pageTitle ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php foreach ($breadcrumbItems as $item): ?>
                    <li class="breadcrumb-item <?= $item['url'] === '#' ? 'active' : '' ?>">
                        <?= $item['url'] === '#' ? $item['title'] : "<a href='{$item['url']}'>{$item['title']}</a>" ?>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="./" class="brand-link">
        <img src="../assets/img/logo.png" alt="Admin Panel Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"><img src="../assets/img/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info"><a href="./" class="d-block">Fahmi Pajar Rian</a></div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <?php foreach ($menuItems as $menuItem): ?>
                <li class="nav-item has-treeview <?= $menuItem === $activeMenu ? 'menu-open' : '' ?>">
                    <a class="nav-link <?= $menuItem === $activeMenu ? 'active' : '' ?>" href="#">
                        <i class="nav-icon <?= $menuItem['icon'] ?>"></i>
                        <p><?= $menuItem['menuTitle'] ?>
                            <?= !empty($menuItem['pages']) ? '<i class="right fas fa-angle-left"></i>' : '' ?>
                        </p>
                    </a>
                    <?php if (!empty($menuItem['pages'])): ?>
                    <ul class="nav nav-treeview">
                        <?php foreach ($menuItem['pages'] as $page): ?>
                        <li class="nav-item">
                            <a href="<?= $page['url'] ?>" class="nav-link <?= $page === $activePage ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= $page['title'] ?></p>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
                <li class="nav-item" onclick="logout()">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function logout() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, log me out!'
    }).then((result) => {
        if (result.value) {
            window.location.href = './logout/';
        }
    });
}
</script>