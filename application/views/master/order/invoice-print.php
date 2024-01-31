<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    
      <div class="row">
		<div class="col-xs-4">
          <h2 class="page-header">
            <i class="fa fa-file-text"></i> <?php echo $record['order_id'];?>
          </h2>
        </div>
        <div class="col-xs-4 <?php echo (empty($web_settings['gst_number']))? "hidden" : ""; ?>">
          <h2 class="page-header">
            GST No: <?php echo $web_settings['gst_number'];?>
          </h2>
        </div>
		<div class="col-xs-4 <?php echo (empty($web_settings['gst_number']))? "col-xs-offset-4" : ""; ?>">
          <h2 class="page-header">
            <small class="pull-right">Date: <?php echo Datetimeconversion($record['order_date_time']);?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $web_settings['registered_name'];?></strong><br>
            <?php echo $web_settings['registered_address'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $record['name'];?></strong><br>
            <?php echo $record['city_name'];?><br>
           <?php echo $record['state_name'];?><br>
            <?php echo $record['country_name'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?php echo $record['order_id'];?></b><br><br>
          <b>Payment Type:</b> <?php echo ($record['payment_type']=='0')? "<b>Online</b>" : "<b>Offline</b>"; ?><br>
		  <?php if($record['payment_type']=='0'){ ?>
			  <b>Payment Status:</b> <?php echo ($record['payment_status']==1)? "<b class='green'>PAID</b>" : "<b class='red'>UN-PAID</b>"; ?>
		  <?php }else{ ?>
			 <b>Payment Status:</b> <?php echo ($record['offline_payment_status']==1)? "<b class='green'>PAID</b>" : "<b class='red'>UN-PAID</b>"; ?>
		  <?php } ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
             <thead>
            <tr>
              <th>Qty</th>
              <th>Product/Service</th>
              <th>Product Price</th>
              <th>QTY</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
                
                <?php         foreach($record_product AS $rec){  
                                        
                                        $this->db->select('*');
                                        $this->db->from('product');
                                        $this->db->where('id',$rec->product_id);
                                        $query=$this->db->get();       
                                        $result= $query->result();
                                    
                                  ?>
                    
                      <tr>
                          <td>1</td>
                          <td><?php echo $result[0]->product_name;?> </td>
                          <td>Rs. <?php echo $result[0]->selling_price;?></td>
                           <td><?php echo $rec->items;?></td>
                           <td><?php echo ($result[0]->selling_price*$rec->items);?></td>
                        </tr>
                    <?php
                        
                    }
                
                
                ?>
           
            </tbody>
          </table>
        </div>
      
      </div>
    
      <div class="row">
     
        <div class="col-xs-6 col-xs-offset-6">
          <p class="lead">Payment Details</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rs. <?php echo $record['final_paid_amount'];?></td>
              </tr>
           
              <tr>
                <th>Total:</th>
                <td>Rs. <?php echo $record['final_paid_amount'];?></td>
              </tr>
            </table>
          </div>
        </div>
       
      </div>
   
  </section>
  
</div>

</body>
</html>
