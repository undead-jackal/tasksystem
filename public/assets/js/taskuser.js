$(document).ready(function(){
  taskTable()
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

  $("#viewTask form").submitform({
    url:"/saveTask",
    callback:function(data) {
      if (data.insert) {
        $("#viewTask").modal("hide");
        showNotification("top", "right", "Added Successfully", "success");
        taskTable();
      }else {
        alert("error 505")
      }
    }
  })

  $(document).on('click', '.view-btn', function() {
    var id = $(this).data('id');
    $.simpletSubmit({
      url:"/getTaskUser",
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
        $("#viewTask .assign_by").html(data.result["first_name"] + " " +data.result["last_name"]);
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
    url:"/viewTaskUser",
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
        return data.first_name+" "+data.last_name;
      },
      function(data) {

        return data.fname+" "+data.lname;

      },

      function(data) {
        var status = (data.status != 0) ? "Completed" : "Pending";
        return status;
      },
      function(data) {
        return data.deadline;
      },

      function(data) {
        return '<button data-id="'+data.id+'"  data-toggle="modal" data-target="#viewTask" class="btn view-btn btn-sm mr-2"><i class="fa fa-eye"></i></button>';
      },
    ]
  })
}
