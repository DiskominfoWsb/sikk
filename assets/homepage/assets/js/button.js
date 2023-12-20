$("#nav-btn").click(function() {
  $(".navbar-collapse").collapse("toggle");
  return false;
});
$("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});