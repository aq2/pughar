//- validates form field entries before sending to php


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
