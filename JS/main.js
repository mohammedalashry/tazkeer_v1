let menuIcon=document.getElementsByClassName("menu-icon");
menuIcon[0].style.cursor="pointer";
let menu=document.querySelector(".mobilemenu > ul");
menu.style.width="0";
function modaelgen (){
    if(menu.style.width=="0px"){
        setTimeout(function(){
            menu.style.width="100%";
            menu.style.padding="5px";
            menuIcon[0].style.color="rgb(64 71 89 / 100%)";



        },100);
    }

}
document.addEventListener("click",function (){
    
        if (event.target.hasAttribute("menuelement")==false && menu.style.display!="none") {
            menu.style.width="0";
            menu.style.padding="0px";
            menuIcon[0].style.color="#fcf9c6";

        }

    
})
let headline= document.querySelectorAll(".mainbodyarticles > div h3 a");
let paragraph= document.querySelectorAll(".mainbodyarticles > div p");

for (let i=0;i<headline.length;i++){
    if(headline[i].textContent.length>30){
        headline[i].textContent= headline[i].textContent.slice(0,30);
        headline[i].textContent=headline[i].textContent+"...";
    }
    
    if (paragraph[i].textContent.length>100){
        paragraph[i].textContent= paragraph[i].textContent.slice(0,100);
        paragraph[i].textContent=paragraph[i].textContent+"...";

    }
}