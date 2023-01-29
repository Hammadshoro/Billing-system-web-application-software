<!--ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<!-- jQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript"> 
  $(document).ready(function(){
    var total = parseInt( $('#total').text());
      var sub = total+=total;      
      $('#subTotal').text(total);
      
    $(document).on('click', 'button#deleteeditbills', function () {
              
              $(this).closest('tr').remove();
              return false
                     });
 
    $('#example1').dataTable();
    $('#example2').dataTable();
    $('#billtype').on('change',function(){
   var status=$(this).val();
   if(status==""){
    alert('please select account type');
   }else{
       $.ajax({
          method:'POST',
          url:'bill_backend.php',
          data:{status:status},
          success:function(data)
            {
              $('#Accname').html(data);
            }
            
       });  
    }
  }
    );



    $('#Accname').on('change',function(){
   var id=$(this).val();
   if(id==""){
    alert('please select acount name');
   }else{
       $.ajax({
          method:'POST',
          url:'bill_backend.php',
          data:{id:id},
          success:function(data)
            {
               $('#oppening_b').text(data);
             
              }
            
       });  
    }
  }
   
   );
  
   $('#transaction').on("submit", function(E){
          E.preventDefault();
          
          var formData = new FormData(this);

$.ajax({
  url : "bill_backend.php",
  type : "POST",
  data : formData,
  contentType : false,
  processData: false,
  success: function(data){
   alert(data);
  }
});
        
        });
      
  });
</script>
<script type="text/javascript"> 
 $(document).ready(function(){
  $('#usernames').change(function() { 
    var id = $(this).find(':selected')[0].id;
  $.ajax({
          method:'POST',
          url:'connection.php',
          data:{id:id},
          success:function(data)
            {
              var data = JSON.parse(data);
                 $("#openbalance").text(data.balance);
                 $("#bill_id").val(data.id);
             }
            
       });
       $("#openbalance").text("");
         });
        $('#customerbill').on("submit", function(E){
          E.preventDefault();
          
          var formData = new FormData(this);

$.ajax({
  url : "acountbill_backend.php",
  type : "POST",
  data : formData,
  contentType : false,
  processData: false,
  success: function(data){
   alert(data);
  }
});
        
        });
      
        });
 //remain function

        function myRemain(){
        var total =  $('#totalamounts').val();
      var paidamt= $('#paidamount').val();
    var remain = parseInt(total-paidamt);      
  $("#remaining").text(remain);   
  $("#remains").val(remain); 
}



// myBill function
 function myBill(){
    var subtotal = $("#subTotal").text();
     var paidamount=$("#paid").val();        
  var sub = subtotal-paidamount ;
     $("#remain").text(sub);
   }
  
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#browsers').change(function() {
      var id = $(this).find(':selected')[0].id;
      $.ajax({
          method:'POST',
          url:'test.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#price').text(data.price);
              $("#pid").text(data.id);
               //$('#qty').text(data.product_qty);
            }
       });
     });
});
var count = 1;
function addFunction(){
      var name = $('#browsers').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
        var pid=$("#pid").text();
        
        if(qty == qty){
           $('#browsers').val("");
          $('#qty').val("1");
          $('#price').text("");
        
          billFunction();
} 

function billFunction()
          {
          var total = 0;
            var j=0;

          $("#receipt_bill").each(function () {
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
          
          var table =   '<tr id="row_'+count+'"><td id="pId_'+count+'">'+pid+'</td><td id="pname_'+count+'">'+ name + '</td><td id="qtyn_'+count+'">' + qty + '</td><td id="pricen_'+count+'">' + price + '</td><td id="tota_'+count+'"><strong><input type="hidden" class="totalrow" id="tot_'+count+'" value="'+total+'">' +total+ '</strong></td><td><button type="button" id="removebtn" class="btn btn-danger">X</button></td></tr>';
          $('#new').append(table)
            


           // Code for Sub Total of product
            var total = 0;
            $('tbody tr td').each(function() {
                var value = parseInt($('.totalrow', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
            // Code for calculate tax of Subtoal 5% Tax Applied
              var Tax = (total * 5) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();
 
             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 
        
             $(document).on('click', 'button#removebtn', function () {
              var total = 0;
            $('tbody tr td').each(function() {
                var value = parseInt($('.totalrow', this).val());
                if (!isNaN(value)) {
                 total += value;
                }
                 });
             $('#subTotal').text(total);
              
              $(this).closest('tr').remove();
              return false
                     });
         });
         count++;
 
$('#new tr td').each(function(row, tr){
    TableData[row]={
        "P.ID" : $('#pId_'+row).html()
        , "ProductName" :$('#pname_'+row).html()
        , "Quantity" : $('#qtyn_'+row).html()
        , "Price" : $('#pricen_'+row).html()
        ,"Total" : $('#tot_'+row).val()
        

      }
    
  
    }); 

        } 


 
//TableData.shift();
//var TableData;
//TableData = storeTblValues()
//TableData = $.toJSON(TableData);

      }
$(document).on('click', 'a#logoutbutton', function () {
confirm("are you sure want to logout");

});
var TableData = [];
function cashFunction(){
  
  // var bill = [i]+{
  //   'pid':pid,
  //   'product_name':productname,
  //   'price':price,
  //   'total':total,
 // }

var account_id = $("#account_names").val();
var  date = $("#date").val();
var  totalamount = parseInt($("#subTotal").text());
var paidamount = parseInt($("#paid").val());

$.ajax({
url:"bill_backend.php",
type:"post",
data:{account_id:account_id,date:date,totalamount:totalamount,paidamount:paidamount,TableData:TableData},
success:function(data){
  alert(data);
}
});

//  
//  
  // $.post("connection.php", {customer_name:customername,date:date,total_amount:totalamount,paid_amount:paidamount}, function(result){
    // alert(result); 
    // return true;
  // });
}
    </script>


<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

</body>
</html>
