<?php helper('url'); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto CRUD</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: #1f2937;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .site-header {
            width: 100%;
            padding: 20px;
            color: #fff;
            background: #172554;
        }

        .main-nav {
            display: flex;
            gap: 10px;
        }

        .nav-group a {
            display: inline-block;
            padding: 9px 12px;
            border-radius: 7px;
            color: #e0e7ff;
            text-decoration: none;
        }

        .nav-group a:hover,
        .nav-group a:focus-visible {
            color: #172554;
            background: #fff;
        }

        main {
            width: min(100% - 32px, 1328px);
            margin: 32px auto;
        }

    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-content">
            <nav class="main-nav" aria-label="Navegación principal">
                <div class="nav-group">
                    <a href="<?= base_url('transporte') ?>">Transportes</a>
                </div>
                <div class="nav-group">
                    <a href="<?= base_url('pedido') ?>">Pedidos</a>
                </div>
                <div class="nav-group">
                    <a href="<?= base_url('vehiculos') ?>">Vehículos</a>
                </div>
                <div class="nav-group">
                    <a href="<?= base_url('proveedores') ?>">Proveedores</a>
                </div>
                <div class="nav-group">
                    <a href="<?= base_url('clientes') ?>">Clientes</a>
                </div>
                <div class="nav-group">
                    <a href="<?= base_url('producto') ?>">Productos</a>
                </div>
                <div class="nav-group">
                    <a href="<?= base_url('factura') ?>">Facturas</a>
                </div>
            </nav>
        </div>
    </header>
    <main>
