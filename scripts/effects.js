window.onload = ()=>{   
    popUpEffects = () => {
            
            let headerBar = document.querySelector('.header-def')
            let form_text = document.querySelector('.form-bar')
            let log_out_btn = document.querySelector('.log-out')
            let form_position = form_text.getBoundingClientRect().top
            let screenSize = window.innerHeight / 2
            
            if(form_position < screenSize){
                form_text.classList.add('form-bar-vis')
                headerBar.classList.add('header-scroll')
                log_out_btn.classList.add('log-out-hidden')

            }else{
                form_text.classList.remove('form-bar-vis')
                headerBar.classList.remove('header-scroll')
                log_out_btn.classList.remove('log-out-hidden')
            }
    }
    window.addEventListener('scroll',popUpEffects)
}