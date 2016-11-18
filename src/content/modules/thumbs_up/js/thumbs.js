function updateThumbs(element){
   var id = $(element).data("id");
   var dat = localStorage.getItem("thumb_for_" + id);
   var imgdir = $("#image-dir").val();
   if(dat == "up"){
     $(".thumbs-up img").first().attr("src", imgdir + "/up-voted.png");
       $(".thumbs-down img").first().attr("src", imgdir + "/down.png");
     } else if(dat == "down"){
         $(".thumbs-up img").first().attr("src", imgdir + "/up.png");
           $(".thumbs-down img").first().attr("src", imgdir + "/down-voted.png");
   }
}

$(document).ready(function(){
   updateThumbs(".thumbs-container");
})
