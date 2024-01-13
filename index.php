<?php include_once('config.php'); ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Loja Online</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <?= include 'includes/navbar.php' ?>
  <div class="container">
    <div class="row">
      <?php
      // Exibe uma lista de produtos
      $products = getProducts();
      foreach ($products as $product) {
        echo '<div class="col-md-3">';
        echo '<div class="card">';
        echo '<img class="card-img-top" src="' . $product['image'] . '" alt="' . $product['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $product['name'] . '</h5>';
        echo '<p class="card-text">' . $product['description'] . '</p>';
        echo '<p class="card-text">R$ ' . $product['price'] . '</p>';
        echo '<a href="#" class="btn btn-primary">Comprar</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>

  <?= include 'includes/footer.php'?>