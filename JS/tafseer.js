fetch("../tafseer/surahs.json").then((result)=>{
    result=result.json();
    console.log(result);

    return result;
}).then((result)=>{

    //assign the surah id number that will work on
    let surahNumber=window.location.href;
    let getNumber="";
    for (let f=0;f<surahNumber.length;f++){
            if(!isNaN(surahNumber[f])){
                getNumber=getNumber+surahNumber[f];
            }
    }
    surahNumber=getNumber;
    surahNumber=parseInt(surahNumber);
    let surahID=surahNumber-1; 

    //check work by console log
    console.log(result.tafseer[surahID].text);
    //end comment

    //assign main page element
    let mainelement=document.querySelector(".tafseer-page");
    let surahNameElement=document.createElement("div");
    if (sessionStorage.getItem("surahName")!=null){
        surahNameElement.textContent="سورة  "+ sessionStorage.getItem("surahName");
    
    }else{
        surahNameElement.textContent=" ";
    }
    surahNameElement.style.fontWeight="bold";
    var contentElement=document.createElement("p");
    mainelement.appendChild(surahNameElement);
    mainelement.appendChild(contentElement);

    //explode all pages through content text
    let content=result.tafseer[surahID].text;
    let contentarray=new Array;
    contentarray=content.split("________________________________________");

    // assign next,previous,current page elements.
    let currentPageElement=document.querySelector(".current-page");
    let previousElement=document.querySelector(".previous");
    let nextElement=document.querySelector(".next");
    let pageNumber=currentPageElement.textContent-1;

/* Main Code without any Events Function */
    console.log(pageNumber +"first"); //trial 1 to find error of page number.
    function mainCode(){

        if (pageNumber==0){
            let versesContent="";
            console.log(pageNumber);// 2nd trial to find error of page number

            if (contentarray[pageNumber].indexOf("مَكيّة")!=-1&& surahID==55){
                versesContent=contentarray[pageNumber].slice(0,(contentarray[pageNumber].indexOf("مَكيّة")-22));
            }else if(contentarray[pageNumber].indexOf("مَكيّة")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَكيّة")-16);
                
            }else if(contentarray[pageNumber].indexOf("مَدَنيّة")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَدَنيّة")-15);
                
            }else if(contentarray[pageNumber].indexOf("مدنية")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مدنية")-15);
    
            }else if(contentarray[pageNumber].indexOf("مَكيَّة")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَكيَّة")-15);
                
            }else if(contentarray[pageNumber].indexOf("مَدنيّة-")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَدنيّة-")-17);


            }else if(contentarray[pageNumber].indexOf("مَكِيَّة")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَكِيَّة")-17);


            }else if(contentarray[pageNumber].indexOf("مكية-")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مكية-")-17);


            }else if(contentarray[pageNumber].indexOf("مدينة")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مدينة")-17);


            }else if(contentarray[pageNumber].indexOf("مَدَنية-")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَدَنية-")-18);


            }else if(contentarray[pageNumber].indexOf("مَدَينة-")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَدَينة-")-18);


            }else if(contentarray[pageNumber].indexOf("مَكية-")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَكية-")-17);


            }else if(contentarray[pageNumber].indexOf("مَدَنيَة-")!=-1){
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مَدَنيَة-")-17);


            }else{
                versesContent=contentarray[pageNumber].slice(0,contentarray[pageNumber].indexOf("مكية")-16);
    
            }
            //console.log(versesContent); //check the first verses
            
            let tafseerWord="التفسير";
            let tafseerWordElement=document.createElement("p");
            tafseerWordElement.appendChild(document.createTextNode(tafseerWord));
            let versesContentElement=document.createElement("p");
            versesContentElement.style.color="blue";
            versesContentElement.appendChild(document.createTextNode(versesContent));
            contentElement.appendChild(versesContentElement);
            contentElement.appendChild(tafseerWordElement);
    
            let numOfVerses=[...contentarray[pageNumber].matchAll(/\d+ -/g)];
            let tafseerPartAyah=new Array;
            for (let i=1;i<numOfVerses.length;i++){
                let matchVerse1=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(numOfVerses[i-1][0]));
                let matchVerse2=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(numOfVerses[i][0]));
                tafseerPartAyah[i]=contentarray[pageNumber].slice(matchVerse1,matchVerse2);
                let ayahElement=document.createElement("p");
                ayahElement.appendChild(document.createTextNode(tafseerPartAyah[i]));
                contentElement.appendChild(ayahElement);
            }
            let lastAyahElement=document.createElement("p");
            let startMatchLastAyah=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(numOfVerses[numOfVerses.length-1][0]));
            let endOfAyah="";
            if (contentarray[pageNumber].lastIndexOf("[مِنْ فَوَائِدِ الآيَاتِ]")!=-1){
                endOfAyah=contentarray[pageNumber].lastIndexOf("[مِنْ فَوَائِدِ الآيَاتِ]");
            }else {
                endOfAyah=contentarray[pageNumber].lastIndexOf("________________________________________");
            }
            let lastAyah=contentarray[pageNumber].slice(startMatchLastAyah,endOfAyah);
            lastAyahElement.appendChild(document.createTextNode(lastAyah));
            contentElement.appendChild(lastAyahElement);
            let pElement=document.querySelectorAll(".tafseer-page > p > p");
            for (let i=0;i<numOfVerses.length+2;i++){
                if(pElement[i].textContent.length<6){
                    pElement[i].textContent= pElement[i].textContent.replace("-","+");
                    pElement[i].style.display="inline";
                    pElement[i+1].style.display="inline";
                    
                }
            }
    
        }else{
            let lastIndexOfAyah="";
            if (contentarray[pageNumber].indexOf("[التفسير]")!=-1){
                lastIndexOfAyah=contentarray[pageNumber].indexOf("[التفسير]");
            }else if(contentarray[pageNumber].indexOf("[التَّفْسِيرُ]")!=-1){
                lastIndexOfAyah=contentarray[pageNumber].indexOf("[التَّفْسِيرُ]");
    
            }else{
                lastIndexOfAyah=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(/\d+ -/));
            }
            let verses=contentarray[pageNumber].slice(0,lastIndexOfAyah);
            let versesElement=document.createElement("p");
            versesElement.appendChild(document.createTextNode(verses));
            versesElement.style.color="blue";
            contentElement.appendChild(versesElement);
            let numOfVerses=[...contentarray[pageNumber].matchAll(/\d+ -/g)];
            console.log(pageNumber);// 3rd trial to find error of page number
            let tafseerPartAyah=new Array;
            for (let i=1;i<numOfVerses.length;i++){
                let matchVerse1=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(numOfVerses[i-1][0]));
                let matchVerse2=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(numOfVerses[i][0]));
                tafseerPartAyah[i]=contentarray[pageNumber].slice(matchVerse1,matchVerse2);
                let ayahElement=document.createElement("p");
                ayahElement.appendChild(document.createTextNode(tafseerPartAyah[i]));
                contentElement.appendChild(ayahElement);
            }
            let lastAyahElement=document.createElement("p");
            let startMatchLastAyah=contentarray[pageNumber].indexOf(contentarray[pageNumber].match(numOfVerses[numOfVerses.length-1][0]));
            let endOfAyah="";
            if (contentarray[pageNumber].lastIndexOf("[مِنْ فَوَائِدِ الآيَاتِ]")!=-1){
                endOfAyah=contentarray[pageNumber].lastIndexOf("[مِنْ فَوَائِدِ الآيَاتِ]");
            }else {
                endOfAyah=contentarray[pageNumber].lastIndexOf("________________________________________");
            }
            let lastAyah=contentarray[pageNumber].slice(startMatchLastAyah,endOfAyah);
            lastAyahElement.appendChild(document.createTextNode(lastAyah));
            contentElement.appendChild(lastAyahElement);
            let pElement=document.querySelectorAll(".tafseer-page > p > p");
            for (let i=0;i<numOfVerses.length+1;i++){
                if(pElement[i].textContent.length<6){
                    pElement[i].textContent= pElement[i].textContent.replace("-","+");
                    pElement[i].style.display="inline";
                    pElement[i+1].style.display="inline";
                    
                }
            }
        }

    }
/* END- Main Code without any Events Function -END */
    mainCode();
    
    //previous page event
    previousElement.addEventListener("click",()=>{

        if (pageNumber>0){
            nextElement.style.color="black";
            currentPageElement.textContent--;
            pageNumber=currentPageElement.textContent-1;
            contentElement.innerHTML="";
            mainCode();

        
        }else{
            previousElement.style.color="gray";
        }
    })
    nextElement.addEventListener("click",()=>{
        if (pageNumber<contentarray.length-1 && contentarray.length!=1){
            previousElement.style.color="black";
            currentPageElement.textContent++;
            pageNumber=currentPageElement.textContent-1;
            contentElement.innerHTML="";

            mainCode();
        
        
        }
        if (pageNumber==(contentarray.length-1) || contentarray.length==1){
            nextElement.style.color="gray";
        }else{
            nextElement.style.color="black";

        }
    })


  
    
    


})