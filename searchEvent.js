/*search site*/ 
//elements
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");
const icon = searchWrapper.querySelector(".icon");
let linkTag = searchWrapper.querySelector("a");
let webLink;
// if user press any key and release
inputBox.onkeyup = (e)=>{
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if(userData){
        icon.onclick = ()=>{
            //go to web browser search ~~~~~~~~~~~~~~
            webLink = `https://www.google.com/search?q=${userData}`;
            linkTag.setAttribute("href", webLink);
            linkTag.click();
        }
        emptyArray = suggestions.filter((data)=>{
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data)=>{
            // passing return data inside li tag
            return data = `<li>${data}</li>`;
        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "select(this)");
        }
    }else{
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
}
function select(element){
    let selectData = element.textContent;
    inputBox.value = selectData;
    icon.onclick = ()=>{
        webLink = `https://www.google.com/search?q=${selectData}`;
        linkTag.setAttribute("href", webLink);
        linkTag.click();
    }
    searchWrapper.classList.remove("active");
}
function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = inputBox.value;
        listData = `<li>${userValue}</li>`;
    }else{
      listData = list.join('');
    }
    suggBox.innerHTML = listData;
}


/*slider */
const controls=document.querySelector(".controls");
const container=document.querySelector(".thumbnail-container");
const allBox=container.children;
const containerWidth=container.offsetWidth;
const margin=30;
var items=0;
var totalItems=0;
var jumpSlideWidth=0;


// item setup per slide
responsive=[
  {breakPoint:{width:0,item:1}}, //width > 0 (1 item show) 
  {breakPoint:{width:600,item:2}}, //width > 600 (2 item show) 
  {breakPoint:{width:1000,item:4}} //width > 1000 (4 item show) 
]

function load(){
     for(let i=0; i<responsive.length;i++){
     	if(window.innerWidth>responsive[i].breakPoint.width){
     		items=responsive[i].breakPoint.item
     	}
     }
     start();
}
 
function start(){
    var totalItemsWidth=0
    for(let i=0;i<allBox.length;i++){
            // width and margin setup of items
        allBox[i].style.width=(containerWidth/items)-margin + "px";
        allBox[i].style.margin=(margin/2)+ "px";
        totalItemsWidth+=containerWidth/items;
        totalItems++;
    }

    // thumbnail-container width set up
    container.style.width=totalItemsWidth + "px";

    // slides controls number set up
    const allSlides=Math.ceil(totalItems/items);
    const ul=document.createElement("ul");
    for(let i=1;i<=allSlides;i++){
        const li=document.createElement("li");
            li.id=i;
            li.innerHTML=i;
            li.setAttribute("onclick","controlSlides(this)");
            ul.appendChild(li);
            if(i==1){
            li.className="active";
            }
    }
    controls.appendChild(ul);
}

// when click on numbers slide to next slide
function controlSlides(ele){
    // select controls children  'ul' element 
    const ul=controls.children;

    // select ul children 'li' elements;
    const li=ul[0].children
    
    var active;

    for(let i=0;i<li.length;i++){
        if(li[i].className=="active"){
            // find who is now active
            active=i;
            // remove active class from all 'li' elements
            li[i].className="";
        }
    }
    // add active class to current slide
    ele.className="active";

    var numb=(ele.id-1)-active;
    jumpSlideWidth=jumpSlideWidth+(containerWidth*numb);
    container.style.marginLeft=-jumpSlideWidth + "px";
}

window.onload=load();

