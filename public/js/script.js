document.addEventListener("DOMContentLoaded", () => {
  //All Variables
  const btnSignIn = document.querySelector(".signin-button");
  const btnSignUp = document.querySelector(".signup-button");
  const divButtons = document.querySelector(".buttons");
  const containerForm = document.querySelector(".container-form");
  containerForm.style.display = "none";

  //All Functions
  const fetchPageSignIn = async () => {
    const fetchPage = await fetch("./src/View/signin.php");
    const getFetch = await fetchPage.text();
    containerForm.innerHTML = getFetch;

    const btnClose = document.querySelector(".close-button");

    divButtons.style.display = "none";
    containerForm.style.display = "block";

    btnClose.addEventListener("click", () => {
      console.log("test");
      containerForm.style.display = "block";

      divButtons.style.display = "flex";
      containerForm.style.display = "none";
    });

    //form
    const formSignIn = document.querySelector("#form-signin");
    const messError = document.querySelector("#mess_error");

    formSignIn.addEventListener("submit", (e) => {
      e.preventDefault();
      formRegister(formSignIn, messError);
      console.log("test");
    });
  };

  const formRegister = async (form, messError) => {
    const formData = new FormData(form);

    const fetchForm = await fetch("./src/View/signin.php?register", {
      method: "POST",
      body: formData,
    });

    const getFetch = await fetchForm.json();
    console.log(getFetch['mailFail']);
    
    if(getFetch['mailFail']){

      messError.textContent = getFetch.mailFail;
      messError.style.color = "red";
      setTimeout(() => {
        messError.textContent = "";
      }, 2000);
      
    }else if (getFetch['valid']){
      messError.textContent = getFetch.valid;
      messError.style.color = "green";

    }

    // return getFetch;
  };

  const fetchPageSignUp = async () => {
    const fetchPageSignUp = await fetch("./src/View/signup.php");
    const getFetchPage = await fetchPageSignUp.text();
    containerForm.innerHTML = getFetchPage;
    const btnClose = document.querySelector(".close-button");
    divButtons.style.display = "none";
    containerForm.style.display = "block";
    btnClose.addEventListener("click", () => {
      containerForm.style.display = "block";

      divButtons.style.display = "flex";
      containerForm.style.display = "none";
    });
  };

  //Event
  btnSignIn.addEventListener("click", () => {
    fetchPageSignIn();
  });

  btnSignUp.addEventListener("click", () => {
    fetchPageSignUp();
  });
});
