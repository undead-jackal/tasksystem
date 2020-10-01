$(document).ready(function(){
  clientTable();

  $('.summernote').summernote({
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

  $("#addItem form").submitform({
    url:"/createItem",
    callback:function(data) {
      if (data.insert) {
        $("#addItem").modal("hide");
        $("#addItem form")[0].reset();
        $("#addItem input[name='code']").val(data.uniqid);
        $("#addItem textarea[name='desc']").summernote('code', '');
        showNotification("top", "right", "Added Successfully", "success");
        clientTable();
      }else {
        alert("error 505")
      }
    }
  })

  $(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    $.simpletSubmit({
      url:"/getSpecificItem",
      data:{
        id:id
      },
      callback:function(data) {
        console.log(data);
        $("#updItem input[name='id']").val(id);
        $("#updItem input[name='fname']").val(data.result["first_name"]);
        $("#updItem input[name='lname']").val(data.result["last_name"]);
        $("#updItem input[name='company']").val(data.result["company_name"]);
        $('#updItem select[name="type"] > option').each(function() {
            if ($(this).val() == data.result["type"]) {
              $(this).attr("selected","selected");
            }
        });
        $("#updItem input[name='contact']").val(data.result["contact"]);
        $("#updItem input[name='email']").val(data.result["email"]);
      }
    })
  })

  $("#updItem form").submitform({
    url:"/update",
    callback:function(data) {
      $("#updItem").modal("hide");
      $("#updItem form")[0].reset();
      var msg = "Updated Item Successfully";
      showNotification("top", "right", msg, "success");
      clientTable();
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
            url:"/remove",
            data:{
              id:id
            },
            callback:function(data) {
              swal("Deleted!", "Item Removed.", "success");
              clientTable();
            }
          })
        } else {
            swal("Cancelled", "Nothin was Removed", "error");
        }
    });
  })
})


function clientTable() {
  $('#clientsTable').table({
    url:"/viewItem",
    data:{
      per_page:5,
    },
    render:[
      function(data) {
          return data.a_id;
      },
      function(data) {
        return data.first_name + " " + data.last_name;
      },
      function(data) {
        return data.company_name;
      },
      function(data) {
        var type = (data.type != 0) ? "Client" : "Internal";
        return type;
      },
      function(data) {
        return data.email;
      },
      function(data) {
        return data.contact;
      },
      function(data) {
        return data.date_added;
      },
      function(data) {
        return data.fname + " " + data.lname;
      },
      function(data) {
        return '<button data-id="'+data.a_id+'" data-table="edititem" data-toggle="modal" data-target="#updItem" class="btn edit-btn btn-sm mr-2"><i class="fa fa-edit"></i></button><button data-id="'+data.a_id+'"  class="btn rmv-btn btn-sm"><i class="fa fa-trash"></i></button>';
      },
    ]
  })
}
