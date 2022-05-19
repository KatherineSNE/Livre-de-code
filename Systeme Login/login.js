//*-------------------------------------------------
//* VOIR/CACHER MDP EN UTILISANT UN BOUTON
//*-------------------------------------------------

let y = "Cacher le mot de passe";
let z = "Voir le mot de passe";

let see = document.querySelector(".view")
let hide = document.querySelector(".hide")

let viewType = document.querySelector(".viewPass")
let hidetype =  document.querySelector(".hidePass")

see.addEventListener("click", function(){
    if (see.classList.contains("view")){
        viewType.type= "text";
        see.textContent= y;
        see.classList.toggle("hide");
        see.classList.toggle("view");
        viewType.classList.toggle("hidePass");
        viewType.classList.toggle("viewPass");
    } else if(see.classList.contains("hide")){
        viewType.type ="password";
        see.textContent= z;
        see.classList.toggle("view");
        see.classList.toggle("hide");
        viewType.classList.toggle("viewPass");
        viewType.classList.toggle("hidePass")
    }
});

//*-------------------------------------------------
//* SI LE NAVIGATEUR UTILISÉ EST EDGE, 
//* CACHER LE BOUTON CAHER LUI POUR UX CAR EDGE 
//* AJOUTE AUTOMATIQUEMENT L'OPTION
//*-------------------------------------------------

function browserDetect(){
    let useragent=navigator.userAgent;

    if (useragent.match(/edg/i)){
        let x = document.getElementById("browse");
        x.style.visibility="hidden";
    }
}
browserDetect();
//*-------------------------------------------------
//*  STOCKER L'EMAIL DE L'UTILISATEUR 
//*      DANS LE STOCKAGE LOCAL
//*-------------------------------------------------

let a = "Me Souvenir";
let b = "M'oublier";
let c = document.getElementById("remfor");



let store = document.querySelector(".remember");
let user = document.querySelector(".username");
user.value = localStorage.getItem("Login example");

if(user.value){
    c.textContent=b;
}else{
    c.textContent=a;
}

store.addEventListener("click", function remember(){

if(store.classList.contains("remember")){

    localStorage.setItem("Login example", user.value);
    store.textContent = b;
    store.classList.toggle("forget");
    store.classList.toggle("remember");

}else if(store.classList.contains("forget")){

    localStorage.removeItem("Login example", user.value);
    store.textContent = a;
    store.classList.toggle("remember");
    store.classList.toggle("forget");
}
});
