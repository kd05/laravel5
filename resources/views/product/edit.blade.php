@extends('layout.master')

@section('content')
<html>
    <head>
        <title>Update Product</title>
    </head>
    <body>
        
        <?php
       
        
        
        
        ?>
        
<form action="{{ action('ProductController@updateSave')}}" method="post">
     <input type="hidden" name='_token' value="<?= csrf_token();?>" >
   <input type="hidden" name='id' value="<?php  echo $row->id; ?>" class="form-control">
    Product Name:
    <input type="text" name='product_name' value="<?php  echo $row->product_name; ?>" class="form-control">
    
    Price:
    <input type="text" name='product_price' value="<?php  echo $row->product_price; ?>" class="form-control">
    
    Quantity:
    <input type="text" name='product_qty' value="<?php  echo $row->product_qty; ?>" class="form-control">
    
    <br/>
    <input type="submit" value="Save Record" class="btn btn-primary">
    
</form>
    </body>
</html>
@stop()


