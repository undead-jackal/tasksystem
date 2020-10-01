$(document).ready(function(){
  // $(document).on('blur', '.autocomplete_name', function(e){
  //   setTimeout(function () {
  //     $(this).parent().find(".drp-focus").css("visibility", "hidden!import");
  //     alert();
  //   }, 1000);
  // })
  //
  $('.change-btn').on('click', function(){
    $(this).parents(".row").find("input").removeAttr("readonly");
    $(this).hide();
    $(this).parent().find(".toggle-btn").show();
  })
  $('.close-btn').on('click', function(){
    $(this).parents(".row").find("input").attr("readonly","readonly");
    $(this).parent().find(".change-btn").show();
    $(this).parent().find(".toggle-btn").hide();
  })



  $("#profileModal form").submitform({
    url:"/saveProfile",
    callback:function(data) {
      if (data.result) {
        $('#profileModal input').attr("readonly","readonly");
        $('#profileModal .change-btn').show();
        $('#profileModal .toggle-btn').hide();
        $("#profileModal").modal("hide");

        showNotification("top", "right", "Updated Successfully", "success");
      }else {
        alert("error 505")
      }
    }
  })


  $('#profileModal').on('show.bs.modal', function (e) {
    $.simpletSubmit({
        url:"/getProfile",
        data:{
          id: $(this).data("id")
        },
        callback:function(data){
          $("#profileModal input[name='id']").val(data.result["id"]);
          $("#profileModal input[name='username']").val(data.result["username"]);
          $("#profileModal input[name='codename']").val(data.result["codename"]);
          $("#profileModal input[name='password']").val(data.result["password"]);
        }
    })
  })

  //
  // $(document).on('keyup','.autocomplete_name',function(e) {
  //   var self = $(this);
  //   $.simpletSubmit({
  //     url:"/autocompleteHelper",
  //     data:{
  //       key: $(this).val()
  //     },
  //     callback:function(data) {
  //       var str = "";
  //       self.parent().find(".drp-focus").css("visibility", "visible");
  //
  //       if (data.result.length != 0) {
  //         $(data.result).each(function(i, val){
  //           str += "<a data-id='"+val.id+"' class='dropdown-item autocomplete_item' href='#'>";
  //               str += val.name;
  //           str += "</a>";
  //         })
  //       }else {
  //           str += "<a class='dropdown-item' href='#'>";
  //               str += "No Result";
  //           str += "</a>";
  //       }
  //       self.parent().find(".drp-focus").html(str);
  //     }
  //   })
  // })
})

function showNotification(from, align, message, type) {
  $.notify({
      icon: "nc-icon nc-app",
      message: message

  }, {
      type: type,
      timer: 8000,
      placement: {
          from: from,
          align: align
      }
  });
}
