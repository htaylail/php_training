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
