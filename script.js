
function clearForm() {
  $('#PetroCollectorForm')[0].reset();
}



$(document).ready(function() { 

  $('#clear-form').click(function() {
    clearForm();
  });

  $('#upload-modal-form').click(function() {
        BootstrapDialog.show({
	    title: "Завантаження файлу таблиці",
            message: $('<div></div>').load('form.php?q=uploadForm')
        });
	return false; 
  });


});
