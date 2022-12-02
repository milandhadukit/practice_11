<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Search </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Search in Datatables </h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th> Name</th>
                <th>Gender</th>
                <th>Email</th>
                
            </tr>
        </thead>
    </table>
</div>
<br />
<br />
</div>
</body>
</html>

<script>
$(document).ready(function(){

fill_datatable();

function fill_datatable(gender = '', filter_country = '')
{
var dataTable = $('#customer_data').DataTable({
processing: true,
serverSide: true,
ajax:{
    url: "{{ route('test.getusers') }}",
    data:{gender:gender}
},
columns: [
    {
        data:'name',
        name:'name'
    },
    {
        data:'gender',
        name:'gender'
    },
    {
        data:'email',
        name:'email'
    },
   
    
   
    
]
});
}

$('#filter').click(function(){
var gender = $('#gender').val();


if(gender != '' &&  gender != '')
{
$('#customer_data').DataTable().destroy();
fill_datatable(gender);
}
else
{
alert('Select Both filter option');
}
});

$('#reset').click(function(){
$('#gender').val('');
$('#customer_data').DataTable().destroy();
fill_datatable();
});

});
</script>


