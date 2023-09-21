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
