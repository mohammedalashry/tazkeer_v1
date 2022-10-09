let fullQuraanClassElement = document.querySelector(".full-quraan");
//loop to add all surahs

fetch("https://api.quran.com/api/v4/chapters").then(function (surahData){
    surahData=surahData.json();
    console.log(surahData);
    return surahData;
}).then(function(_surahData){
    for (let i=0;i<114;i++){

        let surahElement = document.createElement("p");
        let idElement = document.createElement("p");
        let idTextElement = document.createTextNode(_surahData.chapters[i].id);
        let surahTextElement = document.createTextNode(_surahData.chapters[i].name_arabic);
        let surahAElement=document.createElement("a");
        surahAElement.setAttribute("href",`tafseer/${i+1}.php`);
        surahAElement.setAttribute("id",_surahData.chapters[i].name_arabic)
        surahAElement.appendChild(surahTextElement);
        surahElement.appendChild(surahAElement);
        idElement.appendChild(idTextElement);
        fullQuraanClassElement.appendChild(idElement);
        fullQuraanClassElement.appendChild(surahElement);
        idElement.setAttribute("class","id-Name");
        surahElement.setAttribute("class","surah-name");

    }
    return fullQuraanClassElement;
    
}).then(function(fullElement){
      let fullBodyElement=document.querySelector(".fullbody");
      let searchBoxButton=document.querySelector(".searchboxbutton");
      let searchBox=document.querySelector(".searchbox");
      searchBox.addEventListener("input",function(){
          if (document.querySelector(".fullbody > a")!=null){
              deleteElements=document.querySelectorAll(".fullbody > a");
              for (let k=0;k<deleteElements.length;k++){
                  deleteElements[k].remove();
              }
          }
          let searchquery=searchBox.value;
          if(searchquery!=""){
              let allAElements=fullElement.querySelectorAll("a");
              var result=new Array;
              for (let j=0;j<allAElements.length;j++){
                  if (allAElements[j].textContent.search(searchquery)!=-1){
                      result[j]= allAElements[j].cloneNode(true);
                      fullElement.style.display="none";
                      
                      fullBodyElement.appendChild(result[j]);
                      
      
      
                  }
              }
              if(result.length==0){
                  fullElement.style.display="inline-grid";
      
              }

          }else{
              fullElement.style.display="inline-grid";
          }
              get('tafseer/reqandrec.html',function(datass,status){
                  console.log(datass);

              })
      })
      let surahElements=document.querySelectorAll(".surah-name");

      for (let i=0;i<=113;i++){
          surahElements[i].addEventListener("click",()=>{
              sessionStorage.setItem("surahName",`${surahElements[i].textContent}`);
          })
      }
      
})


