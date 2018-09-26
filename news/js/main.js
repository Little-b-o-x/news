(function(){
  var iframe = document.getElementById("iframe");
  var navs = document.getElementsByClassName("nav");
  for (var i = 0;i < navs.length;i++){
    navs[i].onclick = function(){
      var navs = document.getElementsByClassName("nav");
      var target = event.target || event.srcElement;
      var src = target.getAttribute("src");
      for (var x = 0;x < navs.length;x++){
        navs[x].setAttribute("class","nav");
      }
      target.setAttribute("class","nav active");
      iframe.setAttribute("src",src);
    }
  }
})();