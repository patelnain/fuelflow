<?php
session_start();
include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "connion failed: " . $e->getMessage();
}
?>
<?php include('include/sidebar.php'); ?>
<!-- Top Bar End -->
<?php include('include/header.php'); ?>
<div class="page-content-wrapper ">



  <div class="row tittle">

    <div class="top col-md-5 align-self-center">
      <h5>Invoice Management</h5>
    </div>

    <div class="col-md-7  align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Invoice</li>
      </ol>
    </div>
  </div>



  <div class="container-fluid">
    <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
      <div class="col-lg-11" style="margin-left: 10%;">
        <div class="card">
          <div class="card-body">

            <div class="tab-content">

              <div class="tab-pane active p-3 abc" id="home" role="tabpanel">
                <form name="myform" method="POST" action="app/order_crud.php">

                  <div class="form-row">
                    <div class="form-group row col-md-6">
                      <label class="col-sm-3 control-label">Customer Name:</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" name="customer_id" class="form-control" data-provide="" placeholder="Customer Name" required> -->

                        <select class="form-control select2 " name="customer_id" id="cust_name">
                          <option value="">Select</option>
                          <?php
                          $stmt = $conn->prepare("SELECT * FROM `customer` where delete_status='0' ");
                          $stmt->execute();
                          $record = $stmt->fetchAll();
                          foreach ($record as $key) { ?>
                            <option value="<?php echo $key['id'] ?>"><?php echo $key['brandName'] ?></option>
                          <?php } ?>

                        </select>
                      </div>
                    </div>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php $current_date = date('Y-m-d'); ?>
                    <div class="form-group row col-md-6">
                      <label class="col-sm-3 control-label"> Date</label>
                      <div class="col-sm-9">
                        <input type="date" name="build_date" class="form-control " value="<?php echo $current_date; ?>" data-provide="datepicker">
                      </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="form-group row col-md-6">
                      <label class="col-sm-3 control-label">Customer No: </label>
                      <div class="col-sm-9">
                        <input type="text" name="customerPhone" class="form-control " placeholder="Customer No" id="customerPhone" minlength="1" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required title="Enter Valid Mobile No">


                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-group row col-md-6">
                      <label class="col-sm-3 control-label">Invoice No:</label>
                      <div class="col-sm-9">
                        <?php
                        $user = "select * from tbl_invoice where  id=(select max(id) from tbl_invoice)";
                        //echo $user;exit;
                        $result = $conn->query($user);
                        foreach ($result as $res) {
                          # code...
                        }

                        $n = "INV-000";
                        $l = $res['id'] + 1;
                        $stall_no = $n . "" . $l; ?>
                        <input type="text" name="inv_no" value="<?php echo $stall_no; ?>" class="form-control" readonly>
                      </div>
                    </div>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="form-group row col-md-6">
                      <label class="col-sm-3 control-label">Customer Email: </label>
                      <div class="col-sm-9">
                        <input type="email" name="customerEmail" class="form-control " placeholder="Customer Email" id="customerEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>

                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-group row col-md-6">
                      <label class="col-sm-3 control-label"> Address:</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" required name="customerAddress" id="customerAddress" style="height:70px;" placeholder="Customer Address"></textarea>
                      </div>
                    </div>


                  </div>

                  <div class="form-group row">
                    <div class="col-sm-1">
                      Sr no.
                    </div>

                    <div class="col-sm-3">
                      Select Service
                    </div>

                    <div class="col-sm-1">
                      Quantity
                    </div>
                    <div class="col-sm-2">
                      Sale Price
                    </div>
                    <div class="col-sm-2">
                      Total
                    </div>
                    <div class="col-sm-2">
                      Action
                    </div>

                  </div>
                  <div class="mydiv">
                    <div class="form-group row control-group after-add-more subdiv">
                      <div class="col-sm-1 sr_no">1</div>
                      <div class="col-sm-3">
                        <div class="col-sm-12">
                          <select name="product_id[]" class="form-control product_id " required>
                            <option value="">--Select Service--</option>
                            <?php
                            $sql = "SELECT * FROM fuel_tbl where delete_status='0' order by id desc";
                            $statement = $conn->prepare($sql);
                            $statement->execute();
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['fuelName']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" id="quantity1" name="quantity[]" placeholder="Qty" required onblur="GFG_Fun();" pattern="^[0-9]+$" max="">
                        <input type="hidden" class="form-control" id="aquantity" name="aquantity[]" placeholder="Qty" onblur="GFG_Fun();" pattern="^[0-9]+$" readonly="">
                      </div>

                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="rate" name="rate[]" placeholder="Sale Price" required>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control total" id="total" name="total[]" placeholder="Total" readonly="">
                      </div>

                      <div class="col-sm-2">
                        <button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>

                  </div>


                  <div class="copy hide" style="display:none;">
                    <div class="form-group control-group row subdiv">
                      <div class="col-sm-1 sr_no"></div>
                      <div class="col-sm-3">
                        <div class="col-sm-12">
                          <select name="product_id[]" class="form-control product_id ">
                            <option value="">--Select Service--</option>
                            <?php
                            $sql = "SELECT * FROM fuel_tbl where delete_status='0' order by id desc";
                            $statement = $conn->prepare($sql);
                            $statement->execute();
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['fuelName']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Qty" pattern="^[0-9]+$" max="">
                        <input type="hidden" class="form-control" id="aquantity" name="aquantity[]" placeholder="Qty" pattern="^[0-9]+$" readonly="">

                      </div>

                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="rate" name="rate[]" placeholder="Sale Price">
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control total" id="total" name="total[]" placeholder="Total" readonly="">
                      </div>
                      <div class="col-sm-2">
                        <button class="btn btn-danger remove" type="button"><i class="fa fa-minus"></i></button>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row control-group">
                    <label class="col-sm-6 control-label">GST %</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="gst_rate" name="gst_rate" placeholder="GST %" value="0" min="0" max="99">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-6 control-label">Discount</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount %" value="0" min="0" max="100">
                    </div>
                  </div>
                  <input type="hidden" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal" readonly="">

                  <div class="form-group row">
                    <label class="col-sm-6 control-label"> Final Total</label>
                    <div class="col-sm-3">
                      <input type="text" name="final_total" id="final_total" class="form-control" placeholder="Total" readonly="">
                    </div>
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" id="submit_check">Submit</button>
                  <p id="GFG_DOWN" style="color: green;">
                </form>



              </div>
            </div>



          </div>

        </div>
      </div><!--end card-->
    </div><!--end col-->
  </div><!--end row-->
</div> <!-- Page content Wrapper -->
</div> <!-- content -->

<?php include('include/footer.php'); ?>




<script type="text/javascript">
  $(".add-more").on('click', function() {

    var html = $(".copy").html();
    $(".after-add-more").after(html);
    $(".after-add-more").next().find('select[name^="product_id"]').select2();
    show_no();
  });

  $("body").on("click", ".remove", function() {
    $(this).parents(".control-group").remove();
    show_no();
  });

  function show_no() {
    var row_cnt = 0;
    $(".sr_no").each(function() {
      row_cnt++;
      $(this).html(row_cnt);
    });
  }
</script>




<script type="text/javascript">
  $(document).ready(function() {
    $('div.mydiv').on("keyup", 'input[name^="rate"]', function(event) {
      var currentRow = $(this).closest('.subdiv');
      var quantity = currentRow.find('input[name^="quantity"]').val();
      var x = parseInt(quantity);
      var quantityq = currentRow.find('input[name^="aquantity"]').val();
      var x1 = parseInt(quantityq);



      var sale_price = currentRow.find('input[name^="rate"]').val();



      var total = parseInt(sale_price) * parseInt(quantity);
      currentRow.find('input[name^="total"]').val(total);

      var rate = parseInt(total) / parseInt(quantity);


      var total = +currentRow.find('input[name^="total"]').val();
      // $('#subtotal').val(total);
      var sum = 0;
      $('.total').each(function() {
        sum += Number($(this).val());
      });
      $('#subtotal').val(sum);
      $('#final_total').val(sum);

      var sub_text = $('#subtotal').val();
      var sub_total = Number(sub_text);
      $("#final_total").val(sub_total);

      var tot_commi = 0;
      $('.tax_amount').each(function() {
        tot_commi += Number($(this).val());
      });
      $('#total_tax_amount').val(tot_commi);
      var tot_commi = 0;
      $('.taxable_amount').each(function() {
        tot_commi += Number($(this).val());
      });
      $('#total_taxable_amount').val(tot_commi);
    });
    var tot_commi = 0;
    $('.taxable_amount').each(function() {
      tot_commi += Number($(this).val());
    });
    $('#total_taxable_amount').val(tot_commi);
  });


  //customer add start cust_no  cust_email  address
  $('div.abc').on("change", 'select[id^="cust_name"]', function(event) {
    var cust_name = $(this).val();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: 'ajax_product.php',
      data: {
        cust_name: cust_name
      },
      success: function(data) {
        for (var i = 0; i < data['cust'].length; i++) {
          var customerPhone = data['cust'][i]['customerPhone'];
          var customerEmail = data['cust'][i]['customerEmail'];
          var customerAddress = data['cust'][i]['customerAddress'];

          $('input[name^="customerPhone"]').val(customerPhone);
          $('input[name^="customerEmail"]').val(customerEmail);
          $('textarea[name^="customerAddress"]').val(customerAddress);
        }
      }
    });
  });
  //customer add end

  $('div.mydiv').on("keyup", 'input[name^="quantity"]', function(event) {
    var currentRow = $(this).closest('.subdiv');
    var quantity = currentRow.find('input[name^="quantity"]').val();
    var x = parseInt(quantity);
    var quantityq = currentRow.find('input[name^="aquantity"]').val();
    var x1 = parseInt(quantityq);
    //alert(x1);
    // if (x > x1) {
    //   alert('Not Enter Value Greather than stock' + '-' + x1);
    //   location.reload();
    // }

    var sale_price = currentRow.find('input[name^="rate"]').val();

    var total = parseInt(sale_price) * parseInt(quantity);
    currentRow.find('input[name^="total"]').val(total);

    var rate = parseInt(total) / parseInt(quantity);


    var total = +currentRow.find('input[name^="total"]').val();
    // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
      sum += Number($(this).val());
    });
    $('#subtotal').val(sum);
    $('#final_total').val(sum);

    var sub_text = $('#subtotal').val();
    var sub_total = Number(sub_text);
    $("#final_total").val(sub_total);

    var tot_commi = 0;
    $('.tax_amount').each(function() {
      tot_commi += Number($(this).val());
    });
    $('#total_tax_amount').val(tot_commi);
    var tot_commi = 0;
    $('.taxable_amount').each(function() {
      tot_commi += Number($(this).val());
    });
    $('#total_taxable_amount').val(tot_commi);

  });

  $('div.mydiv').on("keyup", 'input[name^="gst"]', function(event) {
    var currentRow = $(this).closest('.subdiv');
    var quantity = currentRow.find('input[name^="quantity"]').val();
    var sale_price = currentRow.find('input[name^="sale_price"]').val();
    var taxable = parseInt(sale_price) * parseInt(quantity);
    currentRow.find('input[name^="taxable_amount"]').val(taxable);

    var taxable_amount = currentRow.find('input[name^="taxable_amount"]').val();
    var gst = currentRow.find('input[name^="gst"]').val();
    var rate = Number(taxable_amount) * (Number(gst) / 100);

    var tax_amount = Number(taxable_amount) * (Number(gst) / 100);
    currentRow.find('input[name^="tax_amount"]').val(tax_amount);

    var total = parseInt(taxable_amount) + parseInt(tax_amount);
    currentRow.find('input[name^="total"]').val(total);

    var rate = parseInt(total) / parseInt(quantity);

    currentRow.find('input[name^="rate"]').val(rate);
    var total = +currentRow.find('input[name^="total"]').val();
    // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
      sum += Number($(this).val());
    });
    $('#subtotal').val(sum);
    $('#final_total').val(sum);

    var sub_text = $('#subtotal').val();
    var sub_total = Number(sub_text);
    $("#final_total").val(sub_total);

    var tot_commi = 0;
    $('.tax_amount').each(function() {
      tot_commi += Number($(this).val());
    });
    $('#total_tax_amount').val(tot_commi);
    var tot_commi = 0;
    $('.taxable_amount').each(function() {
      tot_commi += Number($(this).val());
    });
    $('#total_taxable_amount').val(tot_commi);
  });

  $('form').on("keyup", 'input[name="discount"]', function(argument) {

    var disc = $(this).val();
    var sub_text = $('#subtotal').val();


    var tax_percent = $('#gst_rate').val();
    var disc_amount = Number(sub_text) * (Number(disc) / 100);
    var sub_total = Number(sub_text) - Number(disc_amount);

    var tax_amount = Number(sub_total) * (Number(tax_percent) / 100);
    var taxable_amount = Number(sub_total) - Number(tax_amount);
    $("#total_tax_amount").val(tax_amount);
    $("#total_taxable_amount").val(taxable_amount);

    var sub_total1 = Number(sub_total) - Number(tax_amount);
    $("#final_total").val(sub_total1);
  });

  $('form').on("keyup", 'input[name="gst_rate"]', function(argument) {
    var tax_percent = $(this).val();
    var sub_text = $('#subtotal').val();


    var disc = $('#discount').val();
    var disc_amount = Number(sub_text) * (Number(disc) / 100);
    var sub_total = Number(sub_text) - Number(disc_amount);

    var tax_amount = Number(sub_total) * (Number(tax_percent) / 100);
    var taxable_amount = Number(sub_total) - Number(tax_amount);
    $("#total_tax_amount").val(tax_amount);
    $("#total_taxable_amount").val(taxable_amount);

    var sub_total1 = Number(sub_total) + Number(tax_amount);
    $("#final_total").val(sub_total1);
  });


  $('div.mydiv').on("change", 'select[name^="product_id"]', function(event) {
    var drop_services = $(this).val();
    var cnt = 0;
    $(".product_id").each(function() {
      if (drop_services == $(this).val()) {
        cnt++;
      }
    });
    // if (cnt >= 2) {
    //   alert('Product already exists');
    //   return false;
    // }
    var drop_services = $(this).val();
    var currentRow = $(this).closest('.subdiv');

    $.ajax({
      type: "POST",
      dataType: "json",
      url: 'ajax_product.php',
      data: {
        drop_services: drop_services
      },
      success: function(data) {
        //currentRow.find('input[name^="quantity"]').val(1);
        currentRow.find('input[name^="aquantity"]').val(data['product']['openning_stock']);

        currentRow.find('input[name^="quantity"]').val(0);
        currentRow.find('input[name^="quantity"]').attr('max', data['product']['openning_stock']);

        currentRow.find('input[name^="sale_price"]').val(data['product']['unit_price']);
        var quantity = currentRow.find('input[name^="quantity"]').val();

        var total = data['product']['unit_price'];
        currentRow.find('input[name^="total"]').val(total);

        var rate = parseInt(total) / parseInt(quantity);
        //currentRow.find('input[name^="rate"]').val(rate);
        var rate = data['product']['unit_price'];
        currentRow.find('input[name^="rate"]').val(rate);

        //var total=+currentRow.find('input[name^="total"]').val(total);
        // $('#subtotal').val(total);
        var sum = 0;
        $('.total').each(function() {
          if ($(this).val() != '') {
            sum += parseInt($(this).val());
          }

        });

        var sub = $('#subtotal').val(sum);
        var fsub = $('#final_total').val(sum);

        var tot_commi = 0;
        $('.tax_amount').each(function() {
          tot_commi += Number($(this).val());
        });
        $('#total_tax_amount').val(tot_commi);
        var tot_commi = 0;
        $('.taxable_amount').each(function() {
          tot_commi += Number($(this).val());
        });
        $('#total_taxable_amount').val(tot_commi);
      }
    });

  });

  $('div.mydiv').on("change", 'select[name^="p_group_name"]', function(event) {
    var currentRow = $(this).closest('.subdiv');
    //console.log(currentRow);
    var group_id = $(this).val();
    currentRow.find('select[name^="product_id"]').select2();
    currentRow.find('select[name^="product_id"]').html('<option value="" >Select one </option>');
    $.ajax({
      type: "POST",
      dataType: "json",
      url: 'search_product.php',
      data: {
        group_id: group_id
      },
      success: function(data) {
        for (var i = 0; i < data['products'].length; i++) {
          var p_id = data['products'][i][0];
          var p_name = data['products'][i][2];
          currentRow.find('select[name^="product_id"]').append('<option value="' + p_id + '" > ' + p_name + '</option>');
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
<script type="text/javascript">
  function GFG_Fun() {
    // alert();

    var x = document.getElementById("quantity1").value;

    var x1 = document.getElementById("quantity1").maxlength;
    // alert(x1);
    // if (x > x1) {

    //   alert("OUT OF STOCK");
    // }
    $(document).ready(function() {
      $('#quantity1').on('keydown keyup change', function() {
        var char = $(this).val();
        var charLength = $(this).val().length;
        // alert(char);
        if (charLength < minLength) {
          $('#warning-message').text('Length is short, minimum ' + minLength + ' required.');
        } else if (charLength > maxLength) {
          $('#warning-message').text('Length is not valid, maximum ' + maxLength + ' allowed.');
          $(this).val(char.substring(0, maxLength));
        } else {
          $('#warning-message').text('');
        }
      });
    });
  };
</script>