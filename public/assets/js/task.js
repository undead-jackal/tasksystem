$(document).ready(function(){
  $('#addTask input[name="deadline"]').datetimepicker({
      format: 'YYYY/MM/DD',
  });
  taskTable();
  $(".summernote").summernote({
    tabsize: 2,
    height:300,
    toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen']]
        ]
  });

  $("#addTask form").submitform({
    url:"/createTask",
    callback:function(data) {
      if (data.insert) {
        $("#addTask").modal("hide");
        $("#addTask form")[0].reset();
        $("#addTask textarea[name='instruction']").summernote('code', '');
        showNotification("top", "right", "Added Successfully", "success");
        taskTable();
      }else {
        alert("error 505")
      }
    }
  })

  $(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    $.simpletSubmit({
      url:"/getTask",
      data:{
        id:id
      },
      callback:function(data) {
        console.log(data);
        $("#editTask input[name='id']").val(id);
        $("#editTask input[name='task']").val(data.result["name"]);
        $("#editTask input[name='deadline']").val(data.result["deadline"]);
        $("#editTask textarea[name='instruction']").summernote('code', data.result["instruction"]);
        $('#editTask select[name="assign"] > option').each(function() {
            if ($(this).val() == data.result["assign_to"]) {
              $(this).attr("selected","selected");
            }
        });
        $('#editTask select[name="project"] > option').each(function() {
            if ($(this).val() == data.result["project_id"]) {
              $(this).attr("selected","selected");
            }
        });
      }
    })
  })

  $(document).on('click', '.rmv-btn', function() {
    var id = $(this).data('id');
    swal({
        title: "Are you sure you want to Remove this Task?",
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
            url:"/removeTask",
            data:{
              id:id
            },
            callback:function(data) {
              swal("Deleted!", "Task Removed.", "success");
              taskTable();
            }
          })
        } else {
            swal("Cancelled", "Nothin was Removed", "error");
        }
    });
  })

  $(document).on('click', '.view-btn', function() {
    var id = $(this).data('id');
    $.simpletSubmit({
      url:"/getTask",
      data:{
        id:id
      },
      callback:function(data) {
        console.log(data.result["name"]);
        $("#viewTask input[name='id']").val(id);
        $("#viewTask .project").html(data.result["name"]);
        $("#viewTask .name").html(data.result["t_name"]);
        $("#viewTask .deadline").html(data.result["deadline"]);
        $('#viewTask select[name="status"] > option').each(function() {
            if ($(this).val() == data.result["status"]) {
              $(this).attr("selected","selected");
            }
        });
        $("#viewTask textarea[name='content']").summernote('code', data.result["content"]);
        $("#viewTask .assign_by").html(data.result["codename"]);
        var stats = "";
        if (data.result["status"] == 0) {
          stats = '<div class="alert alert-warning"><span>PENDING</span></div>';
        }else if (data.result["status"] == 1) {
          stats = '<div class="alert alert-primary"><span>INPROGRESS</span></div>';
        }else if (data.result["status"] == 2) {
          stats = '<div class="alert alert-info"><span>FOR QA</span></div>';
        }else if (data.result["status"] == 3) {
          stats = '<div class="alert alert-success"><span>COMPLETED</span></div>';
        }else if (data.result["status"] == 4) {
          stats = '<div class="alert alert-error"><span>UNFINISHED</span></div>';
        }
        $("#viewTask .instruction").html(data.result["instruction"]);

        $("#viewTask .modal-title").html(stats);

      }
    })
  })

})


function taskTable() {
  $('#taskTable').table({
    url:"/viewTask",
    data:{
      per_page:5,
    },
    render:[
      function(data) {
          return data.id;
      },
      function(data) {
        return data.t_name;
      },
      function(data) {
        return data.name;
      },
      function(data) {
        return data.codename;
      },
      function(data) {

        return data.assign_codename;

      },

      function(data) {
        var status = (data.status != 0) ? "Completed" : "Pending";
        return status;
      },
      function(data) {
        return data.deadline;
      },

      function(data) {
        return '<button data-id="'+data.id+'"  data-toggle="modal" data-target="#editTask" class="btn edit-btn btn-sm mr-2"><i class="fa fa-edit"></i></button><button data-id="'+data.id+'"  data-toggle="modal" data-target="#viewTask" class="btn view-btn btn-sm mr-2"><i class="fa fa-eye"></i></button><button data-id="'+data.id+'"  class="btn rmv-btn btn-sm"><i class="fa fa-trash"></i></button>';
      },
    ]
  })
}
