(function () {
  let formSearch = document.querySelector("form#search-patient");
  let searchAttribute = formSearch.getAttribute("action");
  let consult = document.querySelector(".consult-docteur");

  //fucntion XMLhttpRequest

  const getHttpRequest = () => {
    let HttpRequest = null;
    if (window.XMLHttpRequest) {
      HttpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
      HttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return HttpRequest;
  };

  formSearch.addEventListener("submit", async function (e) {
    e.preventDefault();
    let xhr = getHttpRequest();
    let data = new FormData(formSearch);
    let response = await fetch(searchAttribute, {
      method: "POST",
      headers: {
        "X-Request-With": "xmlhttrequest",
      },
      body: data,
    });
    let responseData = await response.json();
    if (response.ok === false) {
      let errors = JSON.parse(responseData);
      let errorKey = Object.keys(errors);
      for (let i in errorKey) {
        let key = errorKey[i];
        let error = errors[key];
        console.log(error);
        let input = document.querySelector("[name=" + key + "]");
        let span = document.createElement("span");
        span.className = "has-error";
        span.innerHTML = error;
        input.parentElement.classList.add("has-danger");
        input.parentElement.appendChild(span);
        span.style.marginTop = "0.8rem";
        span.style.marginRight = "1.2rem";
      }
    } else {
      let result = JSON.parse(xhr.responseText);
      let resultKey = Object.keys(result);
      console.log(result);
      let infoPatient = document.querySelector(".content-patient h6");
      infoPatient.after(
        result.map(function () {
          name, value;
        })
      );
      consult.attr("disabled", false);
      let input = document.querySelector("form#search-patient input");
      input.value = "";
    }
  });
})();
