document.getElementById('form').addEventListener('submit', function (e) {
  let tel = document.getElementById('tel')
  if (tel.value.length !== 13) {
    alert('le numéro est incorrect')
    e.preventDefault()
  }
})
const CreateXHR = () => {
  let result = null
  try {
    result = new XMLHttpRequest()
  }
  catch (Error) {
    try {
      result = new ActiveXObject("Msxml2.XMLHTTP")
    }
    catch (Error) {
      try {
        result = new ActiveXObject("Microsoft.XMLHTTP")
      }
      catch (Error) {
        result = null
      }
      return result
    }
  }
}