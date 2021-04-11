window.onload = ()=>{
    // add new or update quantity of existing item
    let add_Update_Item = (data) =>{
        const statSpan = document.getElementById('stat-span')
        const option = {
            method:'POST',
            cache:'no-cache',
            headers:{
                'Content-Type':'application/json'
            },
            body:JSON.stringify(data)
        }
       
            fetch('../routes/addUpdate.php',option)
            .then(result =>{
                return result.text()
                    .then(textResp =>{
                        statSpan.innerHTML = textResp
                        console.log(textResp)})
            })
            .catch(err=>{console.log(err)})

    }

    let getSearch = (drugName)=>{
        let data = {drugName}
        console.log(data)
        fetch('../routes/search.php',{
            method:'POST',
            cache:'no-cache',
            headers:{
                'Content-Type':'application/json'
            },
            body:JSON.stringify(data)
        }).then(response =>{
            return response.text()
            
        }).then(text =>{
            let searchResult = document.querySelector(".search-results")
            searchResult.innerHTML = text
        })
        .catch(err=>{
            console.error(err)
        })
    
    }

    // get buttons
    let itemBtn = document.getElementById('itm-Btn')
    let newItemBtn = document.getElementById('new-itm-Btn')
    let updtPriceBtn = document.getElementById('upd-Btn')

    // Get Input fields

    let drugID = document.getElementById('drugid')
    let Qnty = document.getElementById('qnty')
    let untPrice = document.getElementById('drugprice')
    let ExpDate = document.getElementById('expdate')

    let drugType = document.getElementById('drugtype')
    let drugName = document.getElementById('drugname')
    let unitMeasurment = document.getElementById('um')
    

    // Create an even listener
    itemBtn.onclick = ()=>{
        let drugidVal = drugID.value 
        let qntVal = Qnty.value
        let untPriceVal = untPrice.value
        let expireDate = ExpDate.value

        const data ={drugidVal,qntVal,
                    untPriceVal,expireDate,
                Opt:0}
        add_Update_Item(data)

    }

    newItemBtn.onclick = ()=>{
        let drugidVal = drugID.value 
        let qntVal = Qnty.value
        let untPriceVal = untPrice.value
        let expireDate = ExpDate.value

        let DrugType = drugType.value
        let DrugName = drugName.value
        let um = unitMeasurment.value

        const data ={drugidVal,qntVal,
                    untPriceVal,expireDate,
                    DrugType,DrugName,
                    um,Opt:1}

        add_Update_Item(data)
        
    }

    updtPriceBtn.onclick = ()=>{
        let drugidVal = drugID.value 
        let untPriceVal = untPrice.value
        const data ={drugidVal,untPriceVal,Opt:2}

        add_Update_Item(data)
        
    }
    let search = document.getElementById('Search-Btn')
    
    search.addEventListener('click',()=>{  
        console.log("Search")
        let searchBar = document.querySelector('#drugName')
        let drugName = searchBar.value
        getSearch(drugName)
    })
}