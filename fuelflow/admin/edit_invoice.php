<?php 
session_start();
 include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
<?php include('include/sidebar.php');?>
                    <!-- Top Bar End -->
<?php include('include/header.php');?>
                    <div class="page-content-wrapper ">

                       

                            <div class="row tittle">
                                
                                    <div class="top col-md-5 align-self-center">
                                       <h5>Edit Utilization Management</h5>
                                    </div>

                                    <div class="col-md-7  align-self-center">
                                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Utilization</li>
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

                        <div class="tab-pane active p-3" id="home" role="tabpanel">
                        <form name="myform" method="POST" >


                <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->

                  <label class="col-sm-2 control-label">Invoice No</label>
                   <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Invoice Number" value="INV-0001" autocomplete="off" name="uno" required="" readonly="true">
                   </div>


                    <label class="col-sm-2 control-label">Invoice Date</label>

                    <div class="col-sm-4">
                     <input type="date" class="form-control" value="2023-12-07" id="orderDate" name="orderDate" autocomplete="off">
                   </div>
                </div>

               <div class="row mt-3">

                  <label class="col-sm-2 control-label">Client Name</label>
                   <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="Client Name" value="" autocomplete="off" name="uno" required="" readonly="">
                   </div>


                    <label class="col-sm-2 control-label">Client Contact No</label>

                    <div class="col-sm-4">
                     <input type="text" class="form-control" value="" id="orderDate" name="orderDate" autocomplete="off">
                   </div>
                </div>

                     <table class="table" id="productTable">
          <thead>
            <tr>              
              <th style="width:40%;">Medicine</th>
              <th style="width:20%;">Rate</th>
              <th style="width:10%;">Avail.</th>
              <th style="width:15%;">Quantity</th>              
              <th style="width:25%;">Total</th>             
              <th style="width:10%;">Action</th>
            </tr>
          </thead>
          <tbody>
                          <tr id="row1" class="0">                
                <td style="margin-left:20px;">
                  <div class="form-group">

                  <select class="form-control" id="brandStatus" name="brandStatus">
                    <option value="">~~SELECT~~</option>
                    <option value="2" >Paracip paracetamol 650</option>
                    <option value="3" >Acetaminophen</option>
                    <option value="4" >MED1A</option>
                    <option value="5" >Med2B</option>   
                                   </select>
                  </div>
                </td>
                <td style="padding-left:20px;">                 
                  <input type="text" name="rate[]" id="rate1" autocomplete="off" disabled="true" class="form-control">                  
                  <input type="hidden" name="rateValue[]" id="rateValue1" autocomplete="off" class="form-control">                  
                </td>

              <td style="padding-left:20px;">
                  <div class="form-group">
                  <p id="available_quantity1"></p>
                  </div>
                </td>
                <td style="padding-left:20px;">
                  <div class="form-group">
                  <input type="number" name="quantity[]" id="quantity1" onkeyup="getTotalAndProductData(1)" onchange="handleQuantityChange(1)" autocomplete="off" class="form-control" min="1">
              </div>
                </td>
                <td>                 
                  <input type="text" name="total[]" id="total1" autocomplete="off" class="form-control" disabled="true">                  
                  <input type="hidden" name="totalValue[]" id="totalValue1" autocomplete="off" class="form-control">                  
                </td>
                <td>
                 
                   <button type="button" class="btn btn-primary btn-flat " onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="fa fa-plus"></i></button>
                </td>
                  <td>
            
            <button type="button" class="btn btn-danger  removeProductRowBtn" id="removeProductRowBtn" onclick="removeProductRow(1)"><i class="fa fa-trash"></i></button>
            
                </td>
              </tr>
            </tbody>          
        </table>


                <div class="row mb-4">

                  <label class="col-sm-2 control-label">Sub Amount</label>
                   <div class="col-sm-4">
                     <input type="text" class="form-control" placeholder="" value="" autocomplete="off" name="uno" required="" readonly="">
                   </div>


                    <label class="col-sm-2 control-label">Total Amount</label>

                    <div class="col-sm-4">
                     <input type="text" class="form-control" value="" id="orderDate" name="orderDate" autocomplete="off">
                   </div>
                </div>

                 <div class="row mb-3">

                  <label class="col-sm-2 control-label">Discount</label>
                   <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="" value="" autocomplete="off" name="" required="" readonly="">
                   </div>


                    <label class="col-sm-2 control-label">Grand Total</label>

                    <div class="col-sm-4">
                     <input type="text" class="form-control" value="" id="orderDate" name="orderDate" autocomplete="off">
                   </div>
                </div>

                 <div class="row mb-4">

                  <label class="col-sm-2 control-label">GST 18%</label>
                   <div class="col-sm-4">
                     <input type="text" class="form-control" placeholder="" value="" autocomplete="off" name="uno" required="" readonly="">
                   </div>


                    <label class="col-sm-2 control-label">Paid Amount</label>

                    <div class="col-sm-4">
                     <input type="text" class="form-control" value="" id="orderDate" name="orderDate" autocomplete="off">
                   </div>
                </div>

                 <div class="row mb-4">

                  <label class="col-sm-2 control-label">Due Amount</label>
                   <div class="col-sm-4">
                     <input type="text" class="form-control" placeholder="" value="" autocomplete="off" name="uno" required="" readonly="">
                   </div>


                    <label class="col-sm-2 control-label">Payment Type</label>
                     <div class="col-sm-4">
                             <select class="form-control" id="brandStatus" name="brandStatus">
                                                <option value="">~~SELECT~~</option>
                                                <option value="1">FYHYKJJN</option>
                                                <option value="2">RTGVJHJN</option>
                                              </select>
                                          </div>
                </div>

                 <div class="row mb-4">
                      <label class="col-sm-2 control-label">Payment Status</label>
                     <div class="col-sm-4">
                             <select class="form-control" id="brandStatus" name="brandStatus">
                                                <option value="">~~SELECT~~</option>
                                                <option value="1">FYHYKJJN</option>
                                                <option value="2">RTGVJHJN</option>
                                              </select>
                                          </div>

                      <label class="col-sm-2 control-label">Payment Place</label>
                                   <div class="col-sm-4">
                             <select class="form-control" id="brandStatus" name="brandStatus">
                                                <option value="">~~SELECT~~</option>
                                                <option value="1">FYHYKJJN</option>
                                                <option value="2">RTGVJHJN</option>
                                              </select>
                        </div>
                 </div>
                  <div class="row mb-4">

                        <div class="form-group ">
                         
                                <button class="btn btn-primary" type="submit" name="submit" onclick="addService()">Submit</button>
                           
                        </div>

                              <div class="form-group ml-2">
                         
                                <button class="btn btn-danger" type="submit" name="submit" onclick="addService()">Reset</button>
                           
                        </div>
                    </div>
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

<?php include('include/footer.php');?>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->


