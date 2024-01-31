
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Orders</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
					
						<li class="active"><span>Orders</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

    <!-- Main content -->
    <section class="invoice">
	<!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
		<div class="row">
			<div class="col-md-5 col-xs-12">
				<h4 class="main-heading"><i class="fa fa-forward"></i> Orders  <span class="blak-color"> Invoice </span> <span class="badge bg-teal"> Invoice</span></h4> 
			</div>
			
			<div class="col-md-5 col-xs-12 pull-right mmt-5 txtright">
		
			</div>
		</div>
        </div>
      </div>
      <!-- /.box -->
      <!-- title row -->
	  <div id="print_data">
      <div class="row">
		<div class="col-xs-4">
          <h5 class="page-header">
            <i class="fa fa-file-text"></i> <?php echo $record['order_id'];?>
          </h5>
        </div>
        <div class="col-xs-4 <?php echo (empty($web_settings['gst_number']))? "hidden" : ""; ?>">
          <h5 class="page-header">
            GST No: <?php echo $web_settings['gst_number'];?>
          </h5>
        </div>
		<div class="col-xs-4 <?php echo (empty($web_settings['gst_number']))? "col-xs-offset-4" : ""; ?>">
          <h5 class="page-header">
            <small class="pull-right">Date: <?php echo Datetimeconversion($record['order_date_time']);?></small>
          </h5>
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
                
                <?php         
 
                                    foreach($record_product AS $rec){  
                                        
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
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-6">
          <p class="lead">Payment Details</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rs. <?php echo $record['final_paid_amount'];?></td>
              </tr>
              <!--<tr>-->
              <!--  <th>GST Amount</th>-->
              <!--  <td>Rs. <?php echo $record['gst_amount'];?></td>-->
              <!--</tr>-->
              <tr>
                <th>Total:</th>
                <td>Rs. <?php echo $record['final_paid_amount'];?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	</div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
		<a onclick="printDiv('print_data')" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <?php if($invoice_type==0) { ?>
		   <button type="button" class="btn btn-success pull-right" onclick="printpage('<?PHP echo $record['id']?>')"><i class="fa fa-download"></i> Download </button>
		  <?php }else{ ?>
		   <button type="button" class="btn btn-success pull-right" onclick="printpage1('<?PHP echo $record['id']?>')"><i class="fa fa-download"></i> Download </button>
		  <?php } ?>
		 
          </button>
        </div>
      </div>
	  
    </section>
    <div class="box box-primary mt-10">
	  <div class="box-header with-border text-center">
		 <?php if($invoice_type==0) { ?>
		  <!--<a href="<?php echo base_url();?>master/orders/index/1"> <button type="button" class="btn  btn-primary"> <i class="fa fa-arrow-left"></i> Back </button></a>-->
		  <?php }else{ ?>
		  <!--<a href="<?php echo base_url();?>master/orders/add_on_packages/1"> <button type="button" class="btn  btn-primary"> <i class="fa fa-arrow-left"></i> Back </button></a>-->
		  <?php } ?>
		
	  </div>
	</div>
	
	
	
  </div>
  
     </div>
  
  
  <script type="text/javascript">
function printDiv(print_data) {
    var printContents = document.getElementById(print_data).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
function printpage(id){
	window.location.href = '<?php echo base_url();?>master/download_order/'+id;
}
function printpage1(id){
	window.location.href = '<?php echo base_url();?>master/orders/download_add_on_order/'+id;
}
</script>