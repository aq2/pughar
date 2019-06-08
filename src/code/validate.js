$.validator.messages.required = 'We really do need this info!';

$('#wksh').validate({
  submitHandler: function(form) {
    form.submit();
  }
});

