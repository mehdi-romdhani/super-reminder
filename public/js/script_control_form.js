document.addEventListener('DOMContentLoaded', ()=>{
    const formSignIn = document.querySelector('#form-signin');
    
    if(formSignIn){
        console.log(formSignIn);
        formSignIn.addEventListener('submit',(e)=>{
            e.preventDefault();
            console.log('test');
        })

    }
})