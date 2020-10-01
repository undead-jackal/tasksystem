$(document).ready(function() {
  projectTable();

  $('#addProject input[name="deadline"]').datetimepicker({
      format: 'YYYY/MM/DD',
  });

  $("#addProject form").submitform({
    url:"/projectCreate",
    callback:function(data) {
      if (data) {
        $("#addProject").modal("hide");
        $("#addProject form")[0].reset();
        showNotification("top", "right", "Added Successfully", "success");
        projectTable();
      }else {
        alert("error 505")
      }
    }
  })


  $(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    $.simpletSubmit({
      url:"/getSpecificProject",
      data:{
        id:id
      },
      callback:function(data) {
        console.log(data);
        $("#editProject input[name='id']").val(id);
        $("#editProject input[name='project']").val(data.result["name"]);
        $("#editProject input[name='type']").val(data.result["type"]);
        $("#editProject input[name='deadline']").val(data.result["deadline"]);
        $('#editProject select[name="account"] > option').each(function() {
            if ($(this).val() == data.result["account_owner"]) {
              $(this).attr("selected","selected");
            }
        });
      }
    })
  })

  $("#editProject form").submitform({
    url:"/updateProject",
    callback:function(data) {
      $("#editProject").modal("hide");
      $("#editProject form")[0].reset();
      var msg = "Updated Project Successfully";
      showNotification("top", "right", msg, "success");
      projectTable();
    }
  })

  $(document).on('click', '.rmv-btn', function() {
    var id = $(this).data('id');
    swal({
        title: "Are you sure you want to Remove this item?",
        text: "You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Remove it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm) {
        if (isConfirm) {
          $.simpletSubmit({
            url:"/removeProject",
            data:{
              id:id
            },
            callback:function(data) {
              swal("Deleted!", "Project Removed.", "success");
              projectTable();
            }
          })
        } else {
            swal("Cancelled", "Nothin was Removed", "error");
        }
    });
  })

})


function projectTable() {
  $('#projectTable').table({
    url:"/projectView",
    data:{
      per_page:5,
    },
    render:[
      function(data) {
          return data.p_id;
      },
      function(data) {
        return data.name;
      },
      function(data) {
        return data.p_type;
      },
      function(data) {
        var status = (data.p_status != 0) ? "Completed" : "Pending";
        return status;
      },
      function(data) {
        return data.fname + " " + data.lname;
      },

      function(data) {
        return data.date_added;
      },
      function(data) {
        return data.deadline;
      },

      function(data) {
        return data.first_name+" "+data.last_name;
      },

      function(data) {
        return '<button data-id="'+data.p_id+'"  data-toggle="modal" data-target="#editProject" class="btn edit-btn btn-sm mr-2"><i class="fa fa-edit"></i></button><button data-id="'+data.p_id+'"  class="btn rmv-btn btn-sm"><i class="fa fa-trash"></i></button>';
      },
    ]
  })
}
