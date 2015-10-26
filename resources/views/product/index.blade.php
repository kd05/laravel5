@extends('layout.master')

@section('content')

 <p style="color: red;"><?php echo Session::get('message'); ?></p> 
 
 <a href="productform">Add Product</a>
 
<table class="table table-bordered table-hover">
    <thead>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </thead>
    
    <tbody>
        <?php foreach ($data as $row) {?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->product_name; ?></td>
            <td><?php echo $row->product_price; ?></td>
            <td><?php echo $row->product_qty; ?></td>
            <td>
                <a href='EditProduct/<?php echo $row->id;  ?>'>Edit</a> |
                <a href='DeleteProduct/<?php echo $row->id;  ?>'>Delete</a>
            </td>
            
        </tr>
        
        <?php } ?>
        <tr>
            <td><?php echo $data->render(); ?></td>
        </tr>
    </tbody>
    
    
</table>
@stop()
