<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax student CRUD Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('/js/lib/jquery-3.6.0.min.js') }}"></script>
    <!-- <script src="{{ asset('/js/student-list.js') }}"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 text-center">
          <h2>Laravel Ajax Student CRUD</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2">
          <button type="button" id="addNewStudent" class="btn btn-success">Add New Student</button>
      </div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Grade</th>
                  <th scope="col">Major</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($students as $student)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->grade }}</td>
                    <td>{{ $student->major->name }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $student->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $student->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {!! $students->links() !!}
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-student-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxStudentModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditStudentForm" name="addEditStudentForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  Name" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="grade" class="col-sm-2 control-label">Grade</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="grade" name="grade" placeholder="Format: grade 1 to 12..." min="1" max="12" value=""  required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Major</label>
                <div class="col-sm-12">
                <input type="number" class="form-control" id="major_id" name="major_id" placeholder="Enter Major" value="" required="">
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewStudent">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script>
   $(document).ready(function($){

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#addNewStudent').click(function () {
   $('#addEditStudentForm').trigger("reset");
   $('#ajaxStudentModel').html("Add Student");
   $('#ajax-student-model').modal('show');
});

$('body').on('click', '.edit', function () {

    var id = $(this).data('id');
     
    // ajax
    $.ajax({
        type:"POST",
        url: "{{ url('ajax/students/edit') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#ajaxStudentModel').html("Edit Student");
          $('#ajax-student-model').modal('show');
          $('#id').val(res.id);
          $('#name').val(res.name);
          $('#grade').val(res.grade);
          $('#major_id').val(res.major_id);
       }
    });

});

$('body').on('click', '.delete', function () {

   if (confirm("Are you sure to delete record?") == true) {
    var id = $(this).data('id');
     
    // ajax
    $.ajax({
        type:"DELETE",
        url: "{{ url('ajax/students/{delete}') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          
          window.location.reload();
       }
    });
   }

});

$('body').on('click', '#btn-save', function (event) {

      var id = $("#id").val();
      var name = $("#name").val();
      var grade = $("#grade").val();
      var major_id = $("#major_id").val();

      $("#btn-save").html('Please Wait...');
      $("#btn-save"). attr("disabled", true);
     
    // ajax
    $.ajax({
        type:"POST",
        url: "{{ url('ajax/students/add-update') }}",
        data: {
          id:id,
          name:name,
          grade:grade,
          major_id:major_id,
        },
        dataType: 'json',
        success: function(res){
         window.location.reload();
        $("#btn-save").html('Submit');
        $("#btn-save"). attr("disabled", false);
       }
    });

});

});

</script>
</body>
</html>