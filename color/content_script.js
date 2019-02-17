chrome.storage.sync.get("color", function (obj) {  
    var color = String(obj.color); 
    //change color of the body
    document.body.style.backgroundColor=color;
    //change color of all div elements
    var divs = document.getElementsByTagName("DIV");
    for(var i = 0; i < divs.length; i++) {
      divs[i].style.background = color;
    }
    //change color of children of body element
    var nodes = document.body.children;
    for(var i=0; i<nodes.length; i++) {
        nodes[i].style.background = color;
    }
});