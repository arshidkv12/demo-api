<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Api Demo</title> 
      <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/custom.js';?>"></script>
</head>
<body>
<div id="container">
    <h1>Api Demo</h1>
    <div id="body">

        <p>POST /orders ­ Create order in the system and persist the same in orders and order_items table.</p>
        <form method="post" class="col-md-6 create-order">
            <div class="form-group">
                <input class="form-control url" type="text" name="url" value="api/orders" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Item name" type="text" name="name"  required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="email" type="email" name="email"  required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="quantity" type="number" name="quantity"  required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="price" type="number" name="price" required>
            </div>
            <input class="btn btn-default" type="submit" name="">
            <p class="status"></p>
            <code>
                <pre></pre>
            </code>
        </form>

        <div class="line"></div>

        <p>GET /orders/today ­ Get all orders which were created today.</p>
        <form method="post" class="col-md-6 today-data">
            <div class="form-group">
                <input class="form-control url" type="text" name="url" value="api/orders/today" required>
            </div>
            <input class="btn btn-default" type="submit" name="">
            <p class="status"></p>
            <code>
                <pre></pre>
            </code>
        </form>

    <div class="line"></div>
    <p>GET /orders/{id} ­ Get order by id</p>
    <form method="post" class="col-md-6 order-byid">
        <div class="form-group">
            <input class="form-control url" type="text" name="url" value="api/orders/21" required>
        </div>
        <input class="btn btn-default" type="submit" name="">
    <p class="status"></p>
    <code><pre></pre></code>
    </form>

    <div class="line"></div>
    <p>PUT /orders/{id}/cancel ­ Cancel the order.</p>
    <form method="post" class="col-md-6 cancel-order">
        <div class="form-group">
            <input class="form-control url" type="text" name="url" placeholder="api/orders/21/cancel"  value="api/orders/21/cancel" required>
        </div>
        <input class="btn btn-default" type="submit" name="">
    <p class="status"></p>
    <code><pre></pre></code>
    </form>

    </div>
</div>

</body>
</html>