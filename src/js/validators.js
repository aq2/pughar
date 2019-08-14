//- validates form field entries before sending to php

function validate(form) {
      let failMessage = validateEmail(form.email.value)
                      // + check4links(form.message.value)

      return check4fail(failMessage)
    }


function validateName(field) {
  return (field == 'me') ? 'Please enter a name \n' : ''
}


function validateEmail(field) {
  if (
    (field.indexOf('.') > 0)
    && (field.indexOf('@') > 0)
    || /[^a-zA-Z0-9.@_-]/.test(field)
  ) {
    return ''
  } else {
    return 'Please enter a valid email address \n'
  }
}


function check4links(field) {
  if (
    (field.includes('http'))
    || (field.includes('www'))
  ) {
      return 'no web links allowed! \n'
  } else {
    return ''
  }
}


function check4fail(failMessage) {
  if (failMessage == '') {
    return true
  } else {
    alert(failMessage)
    return false
  }
}
