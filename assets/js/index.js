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

