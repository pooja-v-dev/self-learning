$(document).ready(function() {
    $('.myDropDown').change(function() {
      var inputValue = $(this).val();
      // alert("value in js " + inputValue);

      $.post('updateStatus.php', {
        dropdownValue: inputValue
      }, function(data) {
        alert('Status has successfully been updated');
        window.location.reload();
      });
    });
  });