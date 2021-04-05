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

    class clientSetUp {
        //  get the value of the form fields   
        constructor(){
            this.sellID = document.querySelector('#sellID');  
            this.searchResult= document.querySelector('.search-result')
            this.responseSpan= document.querySelector('#response-span') 
        }          
    // Get the value of the input fieds   
        getValue = () => {
            let sellVal = this.sellID.value
            
            const val = { sellVal}
            console.log(val)
            return val;
        }
        updateTable = () =>{
            fetch('./routes/getSells.php')
                .then(response =>{
                   return response.text()
                    .then(htmlText =>{
                       // console.log(htmlText)
                        this.searchResult.innerHTML = htmlText
                        //this.srcResult.innerHTML = json
                        const confirm_btn =  document.querySelector('.confirm')
                        confirm_btn.onclick = () =>{
                            let sellVal = confirm_btn.id
                            const data = {sellVal}
                            console.log('clicked')
                             fetch('./routes/sells.php',{
                                    method:'POST',
                                    cache:'no-cache',
                                    headers:{
                                        'Content-Type':'application/json'
                                    },
                                    body:JSON.stringify(data)
                                }).then(res =>{
                                    return res.text()
                                }).then(plainHTML=>{
                                    this.getResponse(plainHTML)
                                })
                        }

                        const cancel_btn =  document.querySelector('.cancel')
                        cancel_btn.onclick = () =>{
                            let sellVal = cancel_btn.id
                            const data = {sellVal}
                            console.log('clicked')
                             fetch('./routes/cancel.php',{
                                    method:'POST',
                                    cache:'no-cache',
                                    headers:{
                                        'Content-Type':'application/json'
                                    },
                                    body:JSON.stringify(data)
                                }).then(res =>{
                                    return res.text()
                                }).then(plainHTML=>{
                                    this.getResponse(plainHTML)
                                })
                        }
                        
                    })
                }).catch(err => {console.error(err)})
        }
        // POST the values
          fetchReq = () =>{
            const data = this.getValue()

            const option = {
                method:'POST',
                cache:'no-cache',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(data)
            }
            fetch('./routes/cancel.php',option)
                            .then(response=>{
                                console.log(response)
                                return response.text()
                                }).then(plainHTML=>{
                                    this.getResponse(plainHTML)
                                })        
        }
        getResponse =(plainHTML) =>{
            console.log(plainHTML)
            this.responseSpan.innerHTML = plainHTML 

            }
    }
 
    const btn =  document.querySelector('.btn-submit')
    const newClient = new clientSetUp()

    console.log("Loaded!!")
    window.addEventListener('scroll',popUpEffects)
    btn.onclick = () =>{
        //let str = newClient.getValue()
        newClient.fetchReq()
       // newClient.tableRequest()          

        console.log("Submitted!!")
    }
    setInterval(newClient.updateTable,3000)
}
