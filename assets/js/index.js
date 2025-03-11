// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

//nav

let toggles = document.querySelectorAll(".drawer-toggle");
toggles.forEach((toggle)=> {

  toggle.addEventListener("click", function(){
   
    if(this.nextElementSibling.classList.contains("open")){
      this.nextElementSibling.classList.remove("open")
      this.classList.remove("open")
    }else{
      toggles.forEach((toggle)=>{
        toggle.classList.remove("open");
        toggle.nextElementSibling.classList.remove("open")
  
      })
      this.classList.add("open")
      this.nextElementSibling.classList.add("open")
    }
  
  })
})



//mobile nav
if(window.outerWidth <= 900){
  document.querySelector("#mobile-nav-open").addEventListener("click", function(){
    if(!document.querySelector("header .menu").classList.contains("open")){
      document.querySelector("header .menu").classList.add("open")
    } 
  })
  document.querySelector("#mobile-nav-close").addEventListener("click", function(){
    if(document.querySelector("header .menu").classList.contains("open")){
      document.querySelector("header .menu").classList.remove("open")
    } 
  })
}

document.querySelector("#colophon").addEventListener("click", function(){
  if(!document.querySelector("#colophon").classList.contains("open")){
    document.querySelector("#colophon").classList.add("open")
  }else{
    document.querySelector("#colophon").classList.remove("open")
  }
})