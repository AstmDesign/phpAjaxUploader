$(document).ready(function () {
  $("#btnSubmit").on('click',(function(event) {
    var formData = new FormData($('#myForm')[0]);
    $.ajax({
      url: "action.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData:false,
      success: function(data)
      {
        $("#result").html(data);
      },
      error: function()
      {
        console.log("failed to send the data");
      }
    });
  }));
});
