<?php
/**
 * SIDEBAR COMPONENT
 * Ubicación: app/Views/Layouts/Sidebar.php
 */
?>
<div class="app-menu navbar-menu">
    <!-- SIDEBAR SCROLL -->
    <div class="navbar-inner-scroll">

        <!-- Sidenav Brand -->
        <div class="navbar-brand-box">
            <a href="<?= base_url() ?>" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="<?= base_url('images/logo-sm.png') ?>" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url('images/logo-light.png') ?>" alt="" height="17">
                </span>
            </a>

            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="sidebar-btn">
                <i class="ri-close-line"></i>
            </button>
        </div>

        <!-- Navbar Menu -->
        <ul class="navbar-nav" id="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url() ?>" role="button">
                    <i class="ri-dashboard-2-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url('rooms') ?>" role="button">
                    <i class="ri-hotel-bed-line"></i>
                    <span>Rooms</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url('reservations') ?>" role="button">
                    <i class="ri-calendar-check-line"></i>
                    <span>Reservations</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url('guests') ?>" role="button">
                    <i class="ri-user-3-line"></i>
                    <span>Guests</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url('restaurants') ?>" role="button">
                    <i class="ri-restaurant-line"></i>
                    <span>Restaurants</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url('settings') ?>" role="button">
                    <i class="ri-settings-3-line"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>

