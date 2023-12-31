document.addEventListener("DOMContentLoaded", () => {


  // ------------  All Variables ------------
  const btnSignIn = document.querySelector(".signin-button");
  const btnSignUp = document.querySelector(".signup-button");
  const divButtons = document.querySelector(".buttons");
  const containerForm = document.querySelector(".container-form");
  if(containerForm){
    containerForm.style.display = "none";
  }

  // -------------- All Functions ------------
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

    const fetchForm = await fetch("/super-reminder/home?register", {
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

    //requete de la page 
    const fetchPageSignUp = await fetch("./src/View/signup.php");
    const getFetchPage = await fetchPageSignUp.text();
    console.log(getFetchPage);
  


    containerForm.innerHTML = getFetchPage;
    const btnClose = document.querySelector(".close-button");
    divButtons.style.display = "none";
    containerForm.style.display = "block";
    btnClose.addEventListener("click", () => {
      containerForm.style.display = "block";

      divButtons.style.display = "flex";
      containerForm.style.display = "none";
    });


    //tu peux recuperer tous les éléments du formulaire 

    const formConnect = document.querySelector('#formConnect');
    const messConnect = document.querySelector('#messConnect');

    console.log(formConnect);
    formConnect.addEventListener("submit", async (e) => {
      e.preventDefault();
      console.log('formConnect');

      const formData = new FormData(formConnect);
      const fetchFormConnect = await fetch("/super-reminder/home?login",{
        method: 'POST',
        body: formData,
      })

      const response = await fetchFormConnect.json();
      //message json
      if(response['connectEmpty']){
        messConnect.textContent=response.connectEmpty;
        messConnect.style.color = "red";

      }else if(response['checkLogin']){
        messConnect.textContent=response.checkLogin;
        messConnect.style.color = "red";
        setTimeout(()=>{
          messConnect.textContent = "";

        }
        ,2000);
      }else if(response['validConnect']){
        messConnect.textContent=response.validConnect;
        messConnect.style.color = "green";
        window.location.href = '/super-reminder/users';
      }
    

    })
  };


  // -------------- All Event -------------
  btnSignIn.addEventListener("click", () => {
    fetchPageSignIn();
  });

  btnSignUp.addEventListener("click", () => {
    fetchPageSignUp();
  });
});




