window.onload = ()=>{
    class Admin{
        constructor(){
            console.log("Started ...")
            this.filterById = document.querySelector('#search-by-id')
            this.filterByEmployee = document.querySelector('#search-by-employee')
        }
        updateTable = (textData)=>{
            
            let tbody = document.querySelector('.t-body')
            tbody.innerHTML = textData
        }
        // Filter table
        filterTable = ()=>{
            let DrugID = this.filterById.value
            let UserID = this.filterByEmployee.value
            if(DrugID === ''){ DrugID = "none"}
            

            let data = {DrugID,UserID,byDate:0}

            const option = {
                method:'POST',
                cache:'no-cache',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(data)
            }
            fetch('../routes/getReport.php',option)
                .then(response=>{
                    return response.text()
                }).then(textData=>{
                    
                    this.updateTable(textData)
                })
                .catch(err=>{
                    console.error(err)
                })
            
        }

    getReportByDate = () =>{
        let startDate = document.getElementById('start-date')
        let endDate = document.getElementById('end-date')

        let DrugID = this.filterById.value

        if(DrugID === ''){ DrugID = "none"}

        let UserID = this.filterByEmployee.value

        console.log("Start Date: "+startDate.value)
        console.log("End Date: "+endDate.value)
        let sDate = startDate.value
        let eDate = endDate.value
        let data = {sDate,eDate,DrugID,UserID,byDate:1}
        const option = {
            method:'POST',
            cache:'no-cache',
            headers:{
                'Content-Type':'application/json'
            },
            body:JSON.stringify(data)
        }
        fetch('../routes/getReport.php',option)
                .then(response=>{
                    return response.text()
                }).then(textData=>{
                    
                    this.updateTable(textData)
                })
                .catch(err=>{
                    console.error(err)
                })
    }
    getFullItem = () =>{
        let table = document.querySelector('.report')
        let DrugID = this.filterById.value
        let data = {DrugID}
        const option = {
            method:'POST',
            cache:'no-cache',
            headers:{
                'Content-Type':'application/json'
            },
            body:JSON.stringify(data)
        }
        fetch('../routes/getFullItem.php',option)
                .then(response=>{
                    return response.text()
                }).then(textData=>{
                    
                    table.innerHTML = textData;
                })
                .catch(err=>{
                    console.error(err)
                })
    }

    }

    // Create Admin Object
    const admin = new Admin()
    // Button Even listener...
    let filterButton = document.querySelector('#filter-btn');
    filterButton.onclick = ()=>{
        admin.filterTable()
    }
    let reportBtn = document.getElementById('gen-report')
    reportBtn.onclick = ()=>{
        admin.getReportByDate()
    }

    let fullItemBtn = document.getElementById('getFullItem')
    fullItemBtn.onclick = ()=>{
        admin.getFullItem()
    }

    
}