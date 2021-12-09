var divs = ["homeadmin", "membersadmin", "contactsadmin", "commentsadmin", "articlesadmin"];
var visibleId = null;
function montrer(id){
    if(visibleId !== id){
        visibleId = id;
    } 
    cacher();
}

function cacher(){
    var div, i, id;
    for(i = 0; i < divs.length; i++){
        id = divs[i];
        div = document.getElementById(id);
        if(visibleId === id){
            div.style.display = "block";
        } else{
            div.style.display = "none";
        }
    }
}