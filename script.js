$(document).ready(function () {
  // Fade-in animation for the form
  $(".container").hide().fadeIn(1000);

  // Form validation
  $("#regForm").on("submit", function (e) {
    let valid = true;

    $("input[required], select[required]").each(function () {
      if ($(this).val().trim() === "") {
        $(this).css("border", "2px solid red");
        valid = false;
      } else {
        $(this).css("border", "2px solid #00c6ff");
      }
    });

    if (!valid) {
      e.preventDefault();
      $(".container").effect("shake", { distance: 5 });
      alert("⚠️ Please fill in all required fields!");
    } else {
      alert("✅ Form submitted successfully!");
    }
  });

  // Change input border color on focus
  $("input, select")
    .on("focus", function () {
      $(this).css("border", "2px solid #f72585");
    })
    .on("blur", function () {
      $(this).css("border", "1px solid #ccc");
    });
});
