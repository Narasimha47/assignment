<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>
    <body>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Task</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </header>


        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>index.php/dashboard/cartList">
                                    <span data-feather="file"></span>
                                    Cart
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>index.php/dashboard/makes">
                                    <span data-feather="shopping-cart"></span>
                                    Make
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>index.php/dashboard/models">
                                    <span data-feather="users"></span>
                                    Models
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>index.php/dashboard/processors">
                                    <span data-feather="bar-chart-2"></span>
                                    Processors
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>index.php/dashboard/users">
                                    <span data-feather="layers"></span>
                                    Users
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>