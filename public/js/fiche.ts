import '../vendors/jquery-3.5.0.min';
(function () {
  let form = document.querySelector('form#form')
  let forms = document.getElementsByClassName('needs-validation');
  let formAttribute = form.getAttribute('action');
  let title = document.querySelector('.title-register')
  let btn = document.querySelector('button[type=submit]');
  let btnText = btn.textContent;
  form.addEventListener('submit', async function (e) {
    e.preventDefault();


    btnText.textContent = 'Chargement....'
    let data = new FormData(form);
    let response = await fetch(formAttribute, {
      method: 'POST',
      headers: {
        'X-Request-With': 'xmlhttpresquest'
      },
      body: data
    })
    let responseData = await response.json();
    if (response.ok === false) {
      let errorKeys = Object.keys(responseData);
      for (let i in errorKeys) {
        let key = errorKeys[i];
        let error = responseData[key];
        let input = document.querySelector('[name=' + key + ']')
        let small = document.createElement('small')
        small.className('help-block')
        small.innerHTML = error
        title.after(small)
        input.parentElement.classList.add('has-error')
      }
    } else {
      let result = responseData;
      let rm = document.querySelector('small').style.display = 'none'
      title
      let input = document.querySelectorAll('input');
      for (let i in input) {
        let champ = input[i]
        champ.value = ""
      }
    }
  })

})()