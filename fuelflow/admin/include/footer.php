<?php

include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$y = date('Y');

?>


</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="../assets/js/jquery.min.js"></script>

<!-- validation script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- 
     // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!--<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/modernizr.min.js"></script>
<script src="../assets/js/detect.js"></script>
<script src="../assets/js/fastclick.js"></script>
<script src="../assets/js/jquery.blockUI.js"></script>
<script src="../assets/js/waves.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->

<script src="../assets/plugins/skycons/skycons.min.js"></script>
<script src="../assets/plugins/fullcalendar/vanillaCalendar.js"></script>

<script src="../assets/plugins/raphael/raphael-min.js"></script>
<script src="../assets/plugins/morris/morris.min.js"></script>

<!-- <script src="../assets/pages/dashborad.js"></script> -->
<!-- Required datatable js -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables/jszip.min.js"></script>
<script src="../assets/plugins/datatables/pdfmake.min.js"></script>
<script src="../assets/plugins/datatables/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="../assets/pages/datatables.init.js"></script>
<!-- App js -->
<script src="../assets/js/app.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="../assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="../assets/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
<script src="../assets/plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
<script src="../assets/plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript"></script>
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!--<script src="../assets/pages/form-advanced.js"></script>-->
<!--------Ck Editot ------>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
      console.error(error);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!----------sweetalert---------------------->
<script language="javascript">
  var today = new Date();
  document.getElementById('time').innerHTML = today;
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

<script src="scripts/scripts.js"></script>
<script src="bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en'
    }, 'google_translate_element');

    var $googleDiv = $("#google_translate_element .skiptranslate");
    var $googleDivChild = $("#google_translate_element .skiptranslate div");
    $googleDivChild.next().remove();

    $googleDiv.contents().filter(function() {
      return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
    }).remove();

  }
</script>
<style>
  .goog-te-gadget .goog-te-combo {
    margin: 0px 0;
    padding: 8px;
    color: #000;
    background: #eeee;
  }
</style>
<script>
  document.getElementById("newpassword").addEventListener("input", checkPasswordStrength);

  function checkPasswordStrength() {
    var password = document.getElementById("newpassword").value;
    var strengthText = document.getElementById("password-strength");

    var passwordLength = password.length;
    var strengthLabel = "";

    if (passwordLength >= 8 && passwordLength <= 10) {
      strengthLabel = "Medium";
      strengthText.style.color = "orange";
    } else if (passwordLength > 10) {
      strengthLabel = "Strong";
      strengthText.style.color = "green";
    } else {
      strengthLabel = "Weak";
      strengthText.style.color = "red";
    }

    strengthText.innerHTML = strengthLabel;
  }
</script>


<!-- chart -->
<?php
$stmt = $conn->prepare("SELECT * FROM `fuel_tbl` WHERE delete_status='0'");
$stmt->execute();

$data = array();

// Fetch all records in one go
$records = $stmt->fetchAll();

foreach ($records as $record) {
  $data[] = array($record['fuelName'], (int)$record['openning_stock']);
}

$data_json = json_encode($data);

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    // Parse JSON data
    var jsonData = <?php echo $data_json; ?>;

    // Convert JSON data to Google DataTable format
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'fuelName');
    data.addColumn('number', 'openning_stock');
    jsonData.forEach(function(row) {
      data.addRow(row);
    });

    var options = {
      title: 'Fuel Opening Stock' // Update chart title as needed
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>


<script>
  google.charts.load('current', {
    packages: ['corechart', 'bar']
  });
  google.charts.setOnLoadCallback(drawMultSeries);

  function drawMultSeries() {
    var data = google.visualization.arrayToDataTable([
      ['City', '2010 Population', '2000 Population'],
      ['New York City, NY', 8175000, 8008000],
      ['Los Angeles, CA', 3792000, 3694000],
      ['Chicago, IL', 2695000, 2896000],
      ['Houston, TX', 2099000, 1953000],
      ['Philadelphia, PA', 1526000, 1517000]
    ]);

    var options = {
      title: 'Population of Largest U.S. Cities',
      chartArea: {
        width: '50%'
      },
      hAxis: {
        title: 'Total Population',
        minValue: 0
      },
      vAxis: {
        title: 'City'
      }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<script>
  function editForm(event, id, file) {
    event.preventDefault(); // Prevent the default link behavior

    // Create a form dynamically
    var form = document.createElement('form');
    form.action = file;
    form.method = 'post';

    // Create a hidden input field for the ID
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id';
    input.value = id;

    // Append the input field to the form
    form.appendChild(input);

    // Append the form to the body and submit it
    document.body.appendChild(form);
    form.submit();
  }
</script>


<script>
  function delForm(event, id, file) {
    event.preventDefault(); // Prevent the default link behavior

    // Create a form dynamically
    var form = document.createElement('form');
    form.action = file;
    form.method = 'post';

    // Create a hidden input field for the ID
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'del_id';
    input.value = id;

    // Append the input field to the form
    form.appendChild(input);

    // Append the form to the body and submit it
    document.body.appendChild(form);
    form.submit();
  }
</script>

</body>

</html>