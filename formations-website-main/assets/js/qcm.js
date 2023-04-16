const form = document.querySelector('.qcm-form');
const checkBoxs = document.querySelectorAll(".checkboxQCM")
const inputCheckBoxs = document.querySelectorAll(".checkBoxs")
const radios = document.querySelectorAll(".radiosQCM")
const inputRadios = document.querySelectorAll(".radios")

for(let i = 0;i<checkBoxs.length;i++){
    checkBoxs[i].addEventListener("click",(ev) =>{
        if(inputCheckBoxs[i].style.border != "1px solid black"){
            inputCheckBoxs[i].style.border = "1px solid black"
        }else{
            inputCheckBoxs[i].style.border = "none"
        }

    })
    inputCheckBoxs[i].addEventListener("click",() =>{
        if(inputCheckBoxs[i].style.border != "1px solid black"){
            checkBoxs[i].checked = "true"
            inputCheckBoxs[i].style.border = "1px solid black"
        }else{
            inputCheckBoxs[i].style.border = "none"
            checkBoxs[i].checked = ""
        }
    })


}
for(let i = 0;i<radios.length;i++) {
    radios[i].addEventListener("click",()=>{
        for(let j = 0;j<radios.length;j++) {
            if(i!=j){

                radios[j].checked = ""
                inputRadios[j].style.border = "none"
            }else{
                radios[j].checked = "true"
                inputRadios[j].style.border = "1px solid black"
            }
        }
    })
}

