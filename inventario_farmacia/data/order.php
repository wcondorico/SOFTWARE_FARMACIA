<?php 
    require_once('../class/Stock.php');
    require_once('../class/Cart.php');
    $stocks = $stock->all_stockList();
    $cartDatas = $cart->all_cartDatas($_SESSION['logged_id']);
    //
    //
    //
 ?>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Productos</h3>
            </div>
            <div class="panel-body">
                <!-- start item -->
               <div class="table-responsive">
                        <table id="myTable-item-order" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><center>Código</center></th>
                                    <th><center>Nombre</center></th>
                                    <th><center>Fabricante</center></th>
                                    <th><center>Precio</center></th>
                                    <th><center>Cant.</center></th>
                                    <th><center></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($stocks as $s): ?>
                                <tr align="center">
                                    <td><?= ucwords($s['item_code']); ?></td>
                                    <td><?= ucwords($s['item_name']); ?></td>
                                    <td><?= ucwords($s['item_brand']); ?></td>
                                    <td><?= "$ ".number_format($s['item_price'], 2); ?></td>
                                    <td><?= $s['stock_qty']; ?></td>
                                    <td>
                                        <button onclick="toCart('<?= $s['stock_id']; ?>','<?= $s['stock_qty']; ?>','<?= $s['item_id']; ?>');" type="button" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-item-order').DataTable();
                    });
                </script>

                <!-- end item -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                Carrito
                </h3>
            </div>
            <div class="panel-body">
                <!-- cart -->
                <div class="table-responsive">
                        <table id="myTable-cart" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><center>Nombre</center></th>
                                    <th><center>Precio</center></th>
                                    <th><center>Cant.</center></th>
                                    <th><center>Sub</center></th>
                                    <th><center></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0;
                             foreach($cartDatas as $c): 
                                $price = $c['item_price'];
                                $qty = $c['cart_qty'];
                                $subTotal = $price * $qty;
                                $total += $subTotal;
                            ?>
                                <tr align="center">
                                    <td><?= ucwords($c['item_name']); ?></td>
                                    <td><?= "$ ".number_format($c['item_price'], 2); ?></td>
                                    <td><?= $c['cart_qty']; ?></td>
                                    <td><?= number_format($subTotal,2); ?></td>
                                    <td>
                                    <button onclick="delCart('<?= $c['cart_stock_id']; ?>','<?= $qty; ?>','<?= $c['cart_id']; ?>');" type="button" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><strong>Total:</strong></td>
                                    <td align="center">
                                        <strong><?= number_format($total, 2); ?></strong>
                                    </td>
                                    <td>
                                        <?php if($total > 0): ?>
                                        <button onclick="confirm_cart()" type="button" class="btn btn-success btn-xs">
                                        Confirmar
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-cart').DataTable();
                    });
                </script>

                <!-- cart -->
            </div>
        </div>
    </div>
</div>

<br /><br /><br /><br /><br /><br /><br /><br />