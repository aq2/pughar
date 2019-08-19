//- validates form field entries before sending to php

function validateName(name) {
  return (name == '') ? 'Please enter a name \n' : ''
}

function validateMessage(message) {
  // test for spaces only
  return (/^\s*$/.test(message)) ? 'Please enter a message \n' : ''
}

function validateEmail(email) {
  if (
    (email.indexOf('.') > 0)
    && (email.indexOf('@') > 0)
    || /[^a-zA-Z0-9.@_-]/.test(email)
  ) {
    return ''
  }
  return 'Please enter a valid email address \n'
}

function check4links(message) {
  if (
    (message.includes('http'))
    || (message.includes('www'))
  ) {
      return 'no web links allowed! \n'
  }
  return ''
}

function validatePhone(phone) {
  // at least one number, and spaces ok
  return (/^(?=.*\d)[\d ]+$/.test(phone)) ? '' : 'Please enter a valid phone number \n'
}




function check4fail(failMessage) {
  if (failMessage == '') {
    return true
  } else {
    alert(failMessage)
    return false
  }
}
