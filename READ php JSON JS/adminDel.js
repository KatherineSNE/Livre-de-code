const url = "allProductsAPI.php";

async function affichageBijouDel(){
const allbijou = await fetch(url);
const info = await allbijou.json();
for (let i in info){
let ad = document.getElementById("delete_item");
let bd = document.createElement("img");
let cd = document.createElement("form");
let dd = document.createElement("input")
let ed = document.createElement("input");
let fd = document.createElement("input");
let gd = document.createElement("input");
let hd = document.createElement("textArea");
let jd = document.createElement("input");
let wd = document.createElement("input");
let kd = document.createElement("input"); 
let ld = document.createElement("input");
let md = document.createElement("input");
let nd = document.createElement("input");


bd.setAttribute("src","./images/"+info[i].image_product+"");
bd.setAttribute("alt", "image");

cd.setAttribute("method","post");

dd.setAttribute("type","checkbox");
dd.setAttribute("name","choose");

ed.setAttribute("type","number");
ed.setAttribute("name","id_product");
ed.setAttribute("value",""+info[i].id_product+"");
ed.readOnly = true;

fd.setAttribute("type","text");
fd.setAttribute("name","image_product");
fd.setAttribute("value",""+info[i].image_product+"");
fd.readOnly = true;

gd.setAttribute("type","text");
gd.setAttribute("name","price_product");
gd.setAttribute("value",""+info[i].price_product+"");
gd.readOnly = true;

hd.setAttribute("rows","auto");
hd.setAttribute("cols","1");
hd.setAttribute("name","description_product");
hd.textContent=""+info[i].description_product+"";
hd.readOnly = true;

jd.setAttribute("type","text");
jd.setAttribute("name","length_product");
jd.setAttribute("value",""+info[i].length_product+"");
jd.readOnly = true;

wd.setAttribute("type","text");
wd.setAttribute("name","width_product");
wd.setAttribute("value",""+info[i].width_product+"");
wd.readOnly = true;

kd.setAttribute("type","text");
kd.setAttribute("name","materials_product");
kd.setAttribute("value",""+info[i].materials_product+"");
kd.readOnly = true;

ld.setAttribute("type","text");
ld.setAttribute("name","type_product");
ld.setAttribute("value",""+info[i].type_product+"");
ld.readOnly = true;

md.setAttribute("type","number");
md.setAttribute("name","visibility_product");
md.setAttribute("value",""+info[i].visibility_product+"");
md.readOnly = true;

nd.setAttribute("type","submit");
nd.setAttribute("name", "update_db");
nd.setAttribute("value","Delete");


ad.appendChild(bd);
ad.appendChild(cd);
cd.appendChild(dd);
cd.appendChild(ed);
cd.appendChild(fd);
cd.appendChild(gd);
cd.appendChild(hd);
cd.appendChild(jd);
cd.appendChild(wd);
cd.appendChild(kd);
cd.appendChild(ld);
cd.appendChild(md);
cd.appendChild(nd);



}
}
affichageBijouDel();