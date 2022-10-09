/*
import  { default as Crunker }  from "../node_modules/crunker/dist/crunker.js";

let crunker = new Crunker();
crunker
  .fetchAudio('/ss.mp3', '/ff.mp3')
  .then((buffers) => {
    // => [AudioBuffer, AudioBuffer]
    return crunker.mergeAudio(buffers);
  })
  .then((merged) => {
    // => AudioBuffer
    return crunker.export(merged, 'audio/mp3');
  })
  .then((output) => {
    // => {blob, element, url}
    crunker.download(output.blob);
    document.body.append(output.element);
    console.log(output.url);
  })
  .catch((error) => {
    // => Error Message
  });

crunker.notSupported(() => {
  // Handle no browser support
});

const concatAudio = evt => {
    
    let proms = [1, 2].map(inputNum => new Promise(resolve => {
        let file = document.querySelector('#file'+inputNum).files[0],
    fr = new FileReader();
        fr.onloadend = evt => resolve(fr.result);
        fr.readAsArrayBuffer(file);
    }));
    Promise.all(proms).then(buffers => {
        let blob = new Blob(buffers),
            blobUrl = URL.createObjectURL(blob),
    audio = new Audio(blobUrl);
        audio.play();
    });

   let file1=document.querySelector("#file1");
   let file2=document.querySelector("#file2");
   let file3= new Audio("https://cdn.islamic.network/quran/audio/128/ar.alafasy/1.mp3");
   fr= new FileReader();
   console.log(file1.files[0] instanceof Blob);
   moda =new Blob;

   console.log(moda.arrayBuffer(file1.files[0]));

   fr.readAsArrayBuffer(file1.files[0]);
   fn=new FileReader();
   fn.readAsArrayBuffer(file2.files[0]);
   moda.arrayBuffer(file1.files[0]);
}
document.querySelector(".moda").addEventListener("click",concatAudio); 
     fetch(`https://cdn.islamic.network/quran/audio/128/ar.alafasy/${surahNumber}.mp3`).then((surahAudio)=>{
        surahAudio=surahAudio.json;
        return surahAudio;

    }).then((surahAudio)=>{
        
    })
         })
         
 
         
     }
     let surahPageElement=document.getElementsByClassName("surah-content");
     return surahPageElement;
 
 }).then(function (surahPage)
 {	document.addEventListener("click",function()
     {
         if (surahPage.length>0)
         {
             let surahPageP= document.querySelector(".surah-content p");
             if (event.target!=surahPage[0] && event.target!=surahPageP)
                 {
                     document.body.removeChild(surahPage[0]);
                 }
             
         }
 
     })
     let closeContentElement=document.querySelector(".fa-window-close");
     closeContentElement.addEventListener("click",function()
     {
         document.body.removeChild(surahPage[0]);
     })
 
 
     
 
 })
 
*/

function playNext(lastAyah,i){
    let lestinSpecificAyahDiv= document.querySelector(".listen-specific-ayah");
    let iFrame=document.createElement("iframe");
    iFrame.setAttribute("allow","autoplay");
    lestinSpecificAyahDiv.appendChild(iFrame);
    lestinSpecificAyahDiv.style.flexWrap="wrap";
    arrayofayah[i].style.display="none";
    let iFramedoc=iFrame.contentDocument;

    i++;
    if(i<=lastAyah){
        arrayofayah[i]=new Audio(`https://cdn.islamic.network/quran/audio/128/ar.alafasy/${i}.mp3`);
        lestinSpecificAyahDiv.appendChild(arrayofayah[i]);
        arrayofayah[i].setAttributeNode(document.createAttribute("controls"));
        console.log(arrayofayah[i]);
        iFrame.setAttribute("src",`https://cdn.islamic.network/quran/audio/128/ar.alafasy/${i}.mp3`);
        iFramedoc.body.appendChild(arrayofayah[i]);

        arrayofayah[i].setAttributeNode(document.createAttribute("autoplay"));
        currentTime(arrayofayah,i,lastAyah);
    }
    

}
var pausingAyahAudio=0;
function currentTime(arrayofayah,i,lastAyah){
    let iconListen= document.querySelector(".settings .listen-specific-ayah i");    
    let selectElement22=document.querySelector(".listen-specific-ayah select:nth-of-type(2)");
    selectElement22.addEventListener("change",()=>{
        arrayofayah[i].pause();
        clearTimeout(timeOut);
    })
    if (arrayofayah[i].ended==true){
        
        playNext(lastAyah,i);
    }else{
        var timeOut=setTimeout(() => {
            currentTime(arrayofayah,i,lastAyah);
        }, 300); 
    }

    setTimeout(()=>{
        if (iconListen.getAttribute("class")=="fa fa-play"){
            arrayofayah[i].pause();
            pausingAyahAudio=1;


        }
        if (pausingAyahAudio==1 && iconListen.getAttribute("class")=="fa fa-pause"){
            arrayofayah[i].play();
            pausingAyahAudio=0;


        }
        if (arrayofayah[i].ended==true && i==lastAyah){
            iconListen.setAttribute("class","fa fa-play");
        }
    },200) 

}

let surahNumber=window.location.href;
let getNumber="";
for (let f=0;f<surahNumber.length;f++){
        if(!isNaN(surahNumber[f])){
            getNumber=getNumber+surahNumber[f];
        }
}
surahNumber=getNumber;
surahNumber=parseInt(surahNumber);
let arrayofayah=new Array; 
            //fetch surah number and ayah--

let promiseAyah=fetch("https://api.quran.com/api/v4/chapters").then(function(result){
        result=result.json();
        return result;
}).then((result)=>{
        var startAyahNumber= 0;
        if (surahNumber==1){
            startAyahNumber=1;
        }else{
            for (let n=0;n<surahNumber-1;n++){
                startAyahNumber=startAyahNumber+ result.chapters[n].verses_count;
            }
        }
        return startAyahNumber;
})
            // --END-- Fetch Surah Number--         

//Start main page====================================================
fetch(`https://api.alquran.cloud/v1/surah/${surahNumber}`).then(function (result)
    {
                 result=result.json();
                
                     return result;
                
 
    }).then(function(result){
                 console.log(result.data.ayahs);
                 
                 let bsmallahmain=result.data.ayahs[0].text;
                 let bsmallah="";
                 let surahContent="";
                 if (bsmallahmain.length>20){
                    bsmallah=bsmallahmain.slice(0,38);
                    surahContent=bsmallahmain.slice(39);
                    if(surahNumber==9){
                        surahContent=result.data.ayahs[0].text;
                        bsmallah="";
                    }
                 }

                 for (let j=1;j<result.data.ayahs.length;j++){
                    surahContent= surahContent+" ("+j+") "+result.data.ayahs[j].text;
                 }
                 surahContent=surahContent+" ("+result.data.ayahs.length+") ";
                 let surahTextElement=document.createTextNode(surahContent);
                 let surahPageElementP= document.createElement("p");
                 let surahPageElementDIV= document.createElement("div");
                 let bsmallahElement=document.createElement("p");

                 bsmallahElement.appendChild(document.createTextNode(bsmallah));
                 surahPageElementP.appendChild(surahTextElement);
                 surahPageElementDIV.appendChild(bsmallahElement);
                 surahPageElementDIV.appendChild(surahPageElementP);
                 document.querySelector(".fullsurah").appendChild(surahPageElementDIV);
                 surahPageElementDIV.setAttribute("class",`surah-content`);
                 surahPageElementDIV.setAttribute("style",`	
                 padding: 0 2vw 4vh 2vw;
                 line-height: 7vh;
                 font-size: 1.5vw;
                 box-shadow: rgb(0 0 0 / 20%) 3px 3px, rgb(0 0 0 / 20%) -3px -3px;
                 width:80%;
                 height:fit-content;
                 margin:30px 0;
                 display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                
 
                 `);
                 myMediaQuery(mediaQuery);
                 myMediaQuery2(mediaQuery2);
                 myMediaQuery3(mediaQuery3);
                 myMediaQuery4(mediaQuery4);
                 bsmallahElement.setAttribute("style","	font-family: 'Gulzar', serif;margin-top:30px;")
                 surahPageElementP.setAttribute("style","margin-block: 0;")
                 return result;
 
    }).then(function(result){
        let surahLength= result.data.ayahs.length;
        
        let lestinSpecificAyahDiv= document.querySelector(".listen-specific-ayah");
        let readSpecificAyahDiv=document.querySelector(".read-specific-ayah");
        let fromElement=document.createElement("p");
        fromElement.appendChild(document.createTextNode("استماع من"));
        let selectElement1=document.createElement("select");
        let optionElement=new Array;
        for (let n=1;n<=surahLength;n++){

            optionElement[n]=document.createElement("option");
            let optionText=document.createTextNode(n);
            selectElement1.appendChild(optionElement[n]);
            optionElement[n].appendChild(optionText);
            optionElement[n].setAttribute("value",n);

        }


        let toElement=document.createElement("p");
        toElement.appendChild(document.createTextNode("إلي"));
        let selectElement2=selectElement1.cloneNode(true);
        lestinSpecificAyahDiv.appendChild(fromElement);
        lestinSpecificAyahDiv.appendChild(selectElement1);
        lestinSpecificAyahDiv.appendChild(toElement);
        lestinSpecificAyahDiv.appendChild(selectElement2);
        let fromElement2=fromElement.cloneNode();
        fromElement2.appendChild(document.createTextNode("قراءة من"));
        readSpecificAyahDiv.appendChild(fromElement2);
        readSpecificAyahDiv.appendChild(selectElement1.cloneNode(true));
        readSpecificAyahDiv.appendChild(toElement.cloneNode(true));
        readSpecificAyahDiv.appendChild(selectElement2.cloneNode(true));

        return result;

    }).then(function(result){

        //listen from ayah to ayah-------------------------------
        let lestinSpecificAyahDiv= document.querySelector(".listen-specific-ayah");
        let selectElement1=document.querySelector(".listen-specific-ayah select:first-of-type");
        let selectElement2=document.querySelector(".listen-specific-ayah select:nth-of-type(2)");
        let specificAudioElement=document.createElement("div");
                    specificAudioElement.setAttribute("style",`
                        width:7vh;
                        height:7vh;
                        background: #414759;
                        border-radius: 50%;
                        border: solid rgb(0 0 0/30%) 1px;
                        display: none;
                        justify-content: center;
                        align-items: center;
                    `);
                    let buttonToStart=document.createElement("button");
                    buttonToStart.appendChild(document.createTextNode("تشغيل"));
                    lestinSpecificAyahDiv.appendChild(buttonToStart);
                    lestinSpecificAyahDiv.appendChild(specificAudioElement);
                    let iconListen=document.createElement("i");
                    iconListen.setAttribute("class","fa fa-pause");
                    iconListen.style.color="white";
                    specificAudioElement.appendChild(iconListen);
                    iconListen.style.cursor="pointer";

            let settingsDiv=document.querySelector(".settings");
            let error3="لابد ان تكون الاية الثانية رقمها اكبر من الاولي";
            let errorP=document.createElement("p");
            errorP.style.color="red";
            errorP.appendChild(document.createTextNode(error3));
            settingsDiv.appendChild(errorP);
            errorP.style.display="none";
            let error2= "ربما تواجه مشكلة في تشغيل الايات برجاء المحاولة في وقت اخر والتاكد من سرعة الانترنت";
            let error2TextElement=document.createElement("p");
            error2TextElement.appendChild(document.createTextNode(error2));
            settingsDiv.appendChild(error2TextElement);
            error2TextElement.style.color="red";
            error2TextElement.style.display="none";
            iconListen.addEventListener("click",()=>{
                if (iconListen.getAttribute("class")=="fa fa-pause"){

                    iconListen.setAttribute("class","fa fa-play");

                }else{
                    iconListen.setAttribute("class","fa fa-pause");
                }
            })

        buttonToStart.addEventListener("click",function(){
           
            error2TextElement.style.display="none"
            errorP.style.display="none";

            promiseAyah.then(function (startAyahNumber){

                let ayahvalue1=selectElement1.value;
                let ayahvalue2=selectElement2.value;
                ayahvalue1=parseInt(ayahvalue1);
                ayahvalue2=parseInt(ayahvalue2);
                let startVerse=startAyahNumber+ayahvalue1;
                let lastVerse=startAyahNumber+ayahvalue2;

                if (ayahvalue2>=ayahvalue1){
                    //check for each ayah is ready
                    let errorForListenSpecificAyah=1;
                    for (let j=startVerse;j<=lastVerse;j++){
                        let arrayofayahtry=new Array;
                        arrayofayahtry[j]=new Audio(`https://cdn.islamic.network/quran/audio/128/ar.alafasy/${j}.mp3`);
                        setTimeout(()=>{
                            if (arrayofayahtry[j].readyState!=4){
                                errorForListenSpecificAyah=0;
                                
                            }
                        },1000)
                    }
                    setTimeout(()=>{
                        if (errorForListenSpecificAyah==0){
                            error2TextElement.style.display="block";
                        }
                    },1500)
                    //check for each ayah is read - END
                    specificAudioElement.style.display="flex";
                    
                   
                    let i=startVerse;
                    arrayofayah[i] =new Audio(`https://cdn.islamic.network/quran/audio/128/ar.alafasy/${i}.mp3`);
                    arrayofayah[i].play();
                    iconListen.setAttribute("class","fa fa-pause");
                    currentTime(arrayofayah,i,lastVerse);
    
                }else{

                    errorP.style.display="block";

                }
            })
           

    

             
        })

        //listen from ayah to ayah -END---------------

        //read from ayah to ayah----------------------
        
        let selectElement3=document.querySelector(".read-specific-ayah select:first-of-type");
        let selectElement4=document.querySelector(".read-specific-ayah select:nth-of-type(2)");
        selectElement4.addEventListener("change",function(){
            errorP.style.display="none";
            let ayahvalue1=selectElement3.value;
            let ayahvalue2=selectElement4.value;
            if(ayahvalue1<=ayahvalue2){
               
                ayahvalue1=parseInt(ayahvalue1);
                ayahvalue2=parseInt(ayahvalue2);
                let surahContent=result.data.ayahs[ayahvalue1-1].text;
                if (ayahvalue1==1 && surahNumber!=9){
                    surahContent=result.data.ayahs[0].text.slice(39);
                }
                for (let k=ayahvalue1;k<ayahvalue2;k++){
                    surahContent= surahContent+" ("+k+") "+result.data.ayahs[k].text;
    
    
                }
                let surahContentP=document.querySelector(".surah-content p:nth-of-type(2)"); 
                surahContentP.textContent=surahContent;
            }else{
                errorP.style.display="block";

            }
            let req=new XMLHttpRequest();
    
                 

            
        })
        selectElement3.addEventListener("change",function(){
            errorP.style.display="none";
            let ayahvalue1=selectElement3.value;
            let ayahvalue2=selectElement4.value;
            if(ayahvalue1<=ayahvalue2){
               
                ayahvalue1=parseInt(ayahvalue1);
                ayahvalue2=parseInt(ayahvalue2);
                let surahContent=result.data.ayahs[ayahvalue1-1].text;
                if (ayahvalue1==1 && surahNumber!=9){
                    surahContent=result.data.ayahs[0].text.slice(39);
                }
                for (let k=ayahvalue1;k<ayahvalue2;k++){
                    surahContent= surahContent+" ("+k+") "+result.data.ayahs[k].text;
    
    
                }
                let surahContentP=document.querySelector(".surah-content p:nth-of-type(2)"); 
                surahContentP.textContent=surahContent;
            }else{
                errorP.style.display="block";

            }
            
            
        })
        
        //read from ayah to ayah -END-------------------

    }).catch((err)=>{
        let fullSurah=document.querySelector(".fullsurah");
        let errorP=document.createElement("p");
        errorP.style.color="red";
        errorP.appendChild(document.createTextNode("هناك مشكلة ف الاتصال بقاعدة البيانات حاول مرة اخري بعد مدة"));
        fullSurah.appendChild(errorP);
    })
let listenFullSurah=document.querySelector(".listen-full-surah");
listenFullSurah.setAttribute("src", `https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/${surahNumber}.mp3`);
let settingsDiv=document.querySelector(".settings");
let errorFull=document.createElement("p");
errorFull.style.color="red";
settingsDiv.appendChild(errorFull);
setTimeout(() => {
    if(listenFullSurah.readyState!=4){
        let error="";
        if(listenFullSurah.readyState==2){
            error="الاتصال بالانترنت ضعيف ربما تواجه مشكلة ف جزء استماع السورة بالكامل";

        }else if(listenFullSurah.readyState==3){
            error="الاتصال بالانترنت ضعيف ربما تواجه مشكلة ف جزء استماع السورة بالكامل";

        }

        errorFull.appendChild(document.createTextNode(error));
        
    }
}, 20000); 



var mediaQuery=window.matchMedia("(max-width:1000px)");
var mediaQuery2=window.matchMedia("(max-width:700px)");
var mediaQuery3=window.matchMedia("(max-width:500px)");
var mediaQuery4=window.matchMedia("(max-width:350px)");

function myMediaQuery (mediaQuery){
    let surahBody=document.querySelector(".surah-content");
   if (mediaQuery.matches){
       surahBody.style.lineHeight="4vh";
       surahBody.style.fontSize="2vw";

   }
}
function myMediaQuery2 (mediaQuery2){
    let surahBody=document.querySelector(".surah-content");
   if (mediaQuery2.matches){
       surahBody.style.lineHeight="5vh";
       surahBody.style.fontSize="3vw";

   }
}
function myMediaQuery3 (mediaQuery3){
    let surahBody=document.querySelector(".surah-content");
   if (mediaQuery3.matches){
       surahBody.style.lineHeight="4vh";
       surahBody.style.fontSize="3.5vw";

   }
}
function myMediaQuery4 (mediaQuery4){
    let surahBody=document.querySelector(".surah-content");
   if (mediaQuery4.matches){
       surahBody.style.lineHeight="4vh";
       surahBody.style.fontSize="4.5vw";

   }
}


let surahNameElement=document.querySelector(".surah-name-element");
if (sessionStorage.getItem("surahName")!=null){
    surahNameElement.textContent=sessionStorage.getItem("surahName");

}else{
    surahNameElement.textContent=" ";
}
             

