let pageLink=window.location.href;
pageLink=pageLink.substring(pageLink.lastIndexOf("/")+1);
let pageName="";
if(pageLink=="albukhari.php"){
    pageName="ara-bukhari1";
}else if (pageLink=="abudawod.php"){
    pageName="ara-abudawud1";
}else if (pageLink=="ibnmajah.php"){
    pageName="ara-ibnmajah1";
}else if (pageLink=="malik.php"){
    pageName="ara-malik1";
}else if (pageLink=="muslim.php"){
    pageName="ara-muslim1";
}else if (pageLink=="nesai.php"){
    pageName="ara-nasai1";
}else if (pageLink=="termezei.php"){
    pageName="ara-tirmidhi1";
}


fetch(`https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/${pageName}.json`).then((result)=>{
    result=result.json();
    return result;
}).then((result)=>{
    console.log(result);
    let mainPage=document.querySelector(".hadeeth-page");

    /* ----Main page coding - START----*/
    let contentElement=document.createElement("p");
    mainPage.appendChild(contentElement);
    let content=result.hadiths[0].text;
    contentElement.appendChild(document.createTextNode(content));
    /* ----Main page coding - END------*/

    /* ----SearchBox coding - START----*/
    let searchElement=document.querySelector(".searchbox");
    let searchButton=document.querySelector("#searchbutton");
    
    searchButton.addEventListener("click",()=>{   
        let regEx= /^\s/;
        let myarr=new Array;  
        console.log(searchElement.value.match(regEx));
        if (searchElement.value!="" && searchElement.value.match(regEx)==null){
            let searchquery= searchElement.value.split(" ");

            for (let k=0;k<searchquery.length;k++){
                myarr[k]=new Set();
                for (let i=0;i<result.hadiths.length;i++){

                    if (result.hadiths[i].text.search(searchquery[k])!=-1){
                        myarr[k].add(i);
                    }
                }
            }
            
            let finalSet=new Set();
            if (myarr.length==1){
                finalSet=myarr[0];
            }else if (myarr.length==2){
                finalSet=[...myarr[0]].filter(ele =>myarr[1].has(ele));

            }else if (myarr.length>2){
                finalSet=myarr[0];
                for (let k=1;k<myarr.length;k++){
                finalSet=[...finalSet].filter(ele=>myarr[k].has(ele));
                }
            }
            console.log(finalSet.size);
            
            if (finalSet.size==0){
                mainPage.innerHTML="";
                mainPage.appendChild(document.createTextNode("لا يوجد نتائج"));
            }else{
                mainPage.innerHTML="";
                mainPage.style.padding="30px";
                for (let i=0;i<finalSet.length;i++){
                    let ripElement=document.createElement("a");
                    ripElement.id=finalSet[i];
                    ripElement.appendChild(document.createTextNode(result.hadiths[finalSet[i]].text));
                    mainPage.appendChild(ripElement);
                }
                
            }

        }
        let clickElements= document.querySelectorAll(".hadeeth-page > a");
        for (let clickedElement of clickElements){
            clickedElement.addEventListener("click",()=>{
                mainPage.innerHTML="";
                contentElement.innerHTML="";
                content=result.hadiths[clickedElement.id].text;
                contentElement.appendChild(document.createTextNode(content));
                mainPage.appendChild(contentElement);
            })
        }

    })
    /* ----SearchBox coding - END------*/

    /* ----Page Moving coding - Start----*/
    let previousElement=document.querySelector(".next-page");
    let nextElement=document.querySelector(".previous-page");
    let currentElement=document.querySelector(".current-page");
    previousElement.addEventListener("click",()=>{
        if (currentElement.textContent>1){
            currentElement.textContent--;
            contentElement.innerHTML="";
            content=result.hadiths[currentElement.textContent-1].text;
            contentElement.appendChild(document.createTextNode(content));

        }
    

    })
    nextElement.addEventListener("click",()=>{
        if (currentElement.textContent<result.hadiths.length){
            currentElement.textContent++;
            contentElement.innerHTML="";
            content=result.hadiths[currentElement.textContent-1].text;
            contentElement.appendChild(document.createTextNode(content));
        }

    })
    /* ----Page Moving coding - END------*/

    /* ----Select hadeeth number coding - Start----*/
    let hadeethNumberElement=document.querySelector("#hadeeth-number");
    let selectElement=document.createElement("select");
    selectElement.style.textAlign="center";
    hadeethNumberElement.appendChild(selectElement);
    for (let i=0;i<result.hadiths.length;i++){
        let optionElement=document.createElement("option");
        optionElement.value=i;
        selectElement.appendChild(optionElement);
        optionElement.textContent=i+1;
    }
    selectElement.addEventListener("change",()=>{
        contentElement.innerHTML="";
        content=result.hadiths[selectElement.value].text;
        contentElement.appendChild(document.createTextNode(content));
        currentElement.textContent= parseInt(selectElement.value)+1;

    })
    /* ----Select hadeeth number coding - END------*/


    return result;

})
