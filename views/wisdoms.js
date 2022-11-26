let WsDiv=document.querySelector(".container .wisdoms");

let getWisdoms=()=>{
    var xhr = new XMLHttpRequest();

    xhr.addEventListener("readystatechange", function() {
        if(this.readyState === 4 && this.status ===200) {
            console.log(this.responseText);

            let data=JSON.parse(this.responseText);
            //console.log(data);

            let wisdoms=data.wisdoms;
            //console.log(wisdoms);

            WsDiv.innerHTML="";

            for(let wisdom in wisdoms ){

                let WOn=document.createElement("div");
                WOn.classList.add("wisdom_on");
                let WOnNode=document.createTextNode(wisdoms[wisdom].wisdom_on);
                WOn.append(WOnNode);

                let WText=document.createElement("div");
                WText.classList.add("wisdom_text");
                let WTextNode=document.createTextNode(wisdoms[wisdom].wisdom_text);
                WText.append(WTextNode);

                let WFrom=document.createElement("div");
                WFrom.classList.add("wisdom_from");
                let WFromNode=document.createTextNode(wisdoms[wisdom].wisdom_from);
                WFrom.append(WFromNode);

                let WDiv =document.createElement("div");
                WDiv.classList.add("wisdom");
                WDiv.append(WOn);
                WDiv.append(WText);
                WDiv.append(WFrom);

                WsDiv.append(WDiv);
            }

            if(WsDiv.childNodes.length>0){  
                WsDiv.childNodes[WsDiv.childNodes.length-1].classList.add("active"); //default
            }

        }

        else if(this.readyState === 4 ){
            console.log(this.responseText);
        }
    });

    xhr.open("GET", "../routes/getWisdoms.php?id=619"); //this id to some protection
    xhr.send();
}

getWisdoms();

let left=document.querySelector(".container .control .left");
let right=document.querySelector(".container .control .right");

left.addEventListener("click",()=>{

    if(WsDiv.childNodes.length>0){ 
        let x=null;

        for(let i=0;i<WsDiv.childNodes.length;i++){
    
            for(let j=0;j<WsDiv.childNodes[i].classList.length;j++){
                
                if(WsDiv.childNodes[i].classList[j]==="active"){
                    x=i;
                }
            }   
            WsDiv.childNodes[i].classList.remove("active");
        }
    
        if(x>0){
            WsDiv.childNodes[x-1].classList.add("active");
        }
        else{
            WsDiv.childNodes[WsDiv.childNodes.length-1].classList.add("active");
        }
        
    }
});

right.addEventListener("click",()=>{

    if(WsDiv.childNodes.length>0){
        let x=null;

        for(let i=0;i<WsDiv.childNodes.length;i++){
    
            for(let j=0;j<WsDiv.childNodes[i].classList.length;j++){
                
                if(WsDiv.childNodes[i].classList[j]==="active"){
                    x=i;
                }
            }   
            WsDiv.childNodes[i].classList.remove("active");
        }
    
        if(x<WsDiv.childNodes.length-1){
            WsDiv.childNodes[x+1].classList.add("active");
        }
        else{
            WsDiv.childNodes[0].classList.add("active");
        }
    }
});

let wisdomText=document.getElementById("text");
let wisdomOn=document.getElementById("on");
let wisdomFrom=document.getElementById("from");
let wAdd={wisdom_text:"",wisdom_on:"",wisdom_from:""};

let addWisdom=()=>{

    wAdd.wisdom_text=wisdomText.value;
    wisdomText.value="";
    wAdd.wisdom_on=wisdomOn.value;
    wisdomOn.value="";
    wAdd.wisdom_from=wisdomFrom.value;
    wisdomFrom.value="";

    var data = JSON.stringify(wAdd);
    
    var xhr = new XMLHttpRequest();
    
    xhr.addEventListener("readystatechange", function() {
      if(this.readyState === 4) {
        console.log(JSON.parse(this.responseText).message);
      }
    });
    
    xhr.open("POST", "../routes/addWisdom.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data);

   xhr.addEventListener("loadend",()=>{
        getWisdoms();
    });
}

let btnAdd=document.getElementById("add");
btnAdd.addEventListener("click",()=>{ 
    addWisdom();
});




