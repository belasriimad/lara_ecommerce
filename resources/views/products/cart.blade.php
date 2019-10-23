@extends('layouts.includes.main-index')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-primary panel-left">
        <div class="panel-heading panel-heading-dark"><h3 class="panel-title">Mon panier</h3></div>
                <div class="panel-body">
                    <?php 
                        $item_name = 1;
                        $item_number = 1;
                        $amount = 1;
                        $quantity = 1;
                    ?>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Quantité</th>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th></th>
                                </tr>
                            <?php $i = 1; ?>
                            @foreach(Cart::content() as $cart)
                                <tr>
                                    <td>{{$cart->qty}}</td>
                                    <td>{{$cart->name}}</td>
                                    <td>{{$cart->price}}</td>
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="business" value="imadbelasri@gmail.com">
                                    <input type="hidden" name="item_name_<?php echo $item_name;?>" value="<?php echo $cart->name;?>">
                                    <input type="hidden" name="item_number_<?php echo $item_number;?>" value="<?php echo $cart->id;?>">
                                    <input type="hidden" name="amount_<?php echo $amount;?>" value="<?php echo $cart->price;?>">
                                    <input type="hidden" name="quantity_<?php echo $quantity;?>" value="<?php echo $cart->qty;?>">
                                    <td></td>
                                </tr> 
                            </tbody>  
                            <?php 
                                $item_name++;
                                $item_number++;
                                $amount++;
                                $quantity++;
                            ?>
                            <?php $i++; ?> 
                            @endforeach  
                            <tfoot>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td>Total Ht</td>
                                    <td><?php echo Cart::subtotal(); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td>TVA</td>
                                    <td><?php echo Cart::tax(); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td>Total</td>
                                    <td><span class="label label-danger"><?php echo Cart::total().' dh';?></span></td>
                                </tr>
                            </tfoot>                                 
                        </table>
                        @if(!Auth::check())
                          <a href="{{route('user.login')}}" class="text text-info">Connectez vous pour passer au paiement</a>
                        @else
                        @if(Cart::count() >= 1)
                        <button type="submit" name="upload" class="btn btn-success">Valider vos achats</button>
                        <a href="{{route('product.cancel.cart')}}" class="btn btn-danger">Annuler mon panier</a>
                        @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection