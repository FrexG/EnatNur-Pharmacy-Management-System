 
window.onload = ()=>{
       
    class clientSetUp {
        //  get the value of the form fields   
        constructor(){
            this.form_field = document.getElementsByClassName('formField')
            this.drugID = document.querySelector('#drugID'); 
            this.Qnty = document.querySelector('#Quantity');    
            this.jsonElment = document.querySelector('.table-data') 
            this.srcResult = document.querySelector('.search-result') 
            this.price = document.querySelector('#price')
            let user = document.querySelector('#user')
            this.UserID = user.className
            
        }          
    // Get the value of the input fieds   
        getValue = () => {
            let UserID = this.UserID
            let formField = Array.from(this.form_field)
            let array = Array()
            formField.forEach(element => {
                console.log(element.value)
                if(element.value != ""){
                    array.push(element.value)
                }
                
            });
            const val = {array,UserID}
            return val
        }
        fetchReq = () =>{
            //this.getValue()
          const data = this.getValue()

          const option = {
              method:'POST',
              cache:'no-cache',
              headers:{
                  'Content-Type':'application/json'
              },
              body:JSON.stringify(data)
          }
          fetch('./routes/druglist.php',option)
                          .then(response=>{
                              
                              return response.text()
                              }).then(text=>{
                                 console.log(text)
                                  this.price.innerHTML = text
                              })
                let form_text = document.querySelector('.dynamic-field')
                form_text.reset()
                
                                                           
      }
        // POST the values
          getPaid = () =>{
              //this.getValue()
              let UserID = this.UserID
            const data = {UserID}
            //console.log(data)
            const option = {
                method:'POST',
                cache:'no-cache',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(data)
            }
            fetch('./routes/getPaid.php',option)
                            .then(response=>{
                                
                                return response.text()
                                }).then(json=>{
                                    this.srcResult.innerHTML = json
                                    
                                    const confirm_btn =  document.querySelector('.confirm')
                                    confirm_btn.onclick = () =>{
                                        let id = confirm_btn.id;
                                        const data = {id}
                                        console.log(id)
                                         fetch('./routes/confirmSell.php',{
                                                method:'POST',
                                                cache:'no-cache',
                                                headers:{
                                                    'Content-Type':'application/json'
                                                },
                                                body:JSON.stringify(data)
                                            }).then(res =>{console.log(res)})
                                    }
                                })        
        }
        getResponse =(jsonData) =>{
            jsonData[0].forEach(element =>{
                //console.log(element)
                let newRow = this.jsonElment.insertRow(-1)
                newRow.insertCell().innerHTML = element.DrugName
                newRow.insertCell().innerHTML = element.Quantity
                newRow.insertCell().innerHTML = element.UnitPrice
            }) 
            let newRow = this.jsonElment.insertRow(-1)
            newRow.insertCell().innerHTML = ""
            newRow.insertCell().innerHTML = ""
            newRow.insertCell().innerHTML = ""
            newRow.insertCell().innerHTML = `Total = ${jsonData[1]}`

        }
        getPrice = (drugID)=>{
                fetch('./routes/getPrice.php',{
                    method:'POST',
                    cache:'no-cache',
                    headers:{
                        'Content-Type':'application/json'
                    },
                    body:JSON.stringify(drugID)
                }).then(response =>{
                    
                    return response.text()
                    
                }).then(text =>{
                    this.price.innerHTML = text
                })
                .catch(err=>{
                    console.error(err)
                })
                
        }

        getSearch = (drugName)=>{
            let data = {drugName}
            console.log(data)
            fetch('./routes/search.php',{
                method:'POST',
                cache:'no-cache',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(data)
            }).then(response =>{
                return response.text()
                
            }).then(text =>{
                this.price.innerHTML = text
            })
            .catch(err=>{
                console.error(err)
            })
            
    }
    }

   
    const newClient = new clientSetUp()

    const btn =  document.querySelector('#submit')
    btn.onclick = () =>{
        newClient.fetchReq() 
    }
    const seePrice = document.querySelector('#see-price')
    seePrice.addEventListener('click',()=>{
        let val = newClient.getValue()   
        newClient.getPrice(val)
    })

    const search = document.querySelector('.search')
    
    search.addEventListener('click',()=>{ 
        console.log("Clicked!!")  
        let searchBar = document.querySelector('#drugName')
        let drugName = searchBar.value
        newClient.getSearch(drugName)
    })



    const add_btn =  document.querySelector('.add-element')
    let i = 1
    add_btn.onclick = ()=>{
        let inner = `<label for="drugID">DrugID</label>
                    <input type="text" title="DrugID" class="formField" id="drugID_${i}" value=" "/>
                    <label for="Quantity">Quantity</label>
                    <input type="text" title="Quantity"  class="formField" id="Quantity_${i}" value=" "/> `
                    i = i + 1
        let div_element = document.createElement('div')
        let dynamic_field = document.querySelector('.dynamic-field')
        div_element.innerHTML = inner
        dynamic_field.append(div_element)

    }
    setInterval(newClient.getPaid,3000)

   // window.addEventListener('scroll',popUpEffects)
}
