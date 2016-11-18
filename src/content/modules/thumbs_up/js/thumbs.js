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

function thumbUp(element){
     var id = $(element).data("id");
    var token = $("#csrf-token").val();
     var dat = localStorage.getItem("thumb_for_" + id);
     if(dat == null){

      localStorage.setItem("thumb_for_" + id, "up");
      updateThumbs(".thumbs-container");
       $.post(
         "index.php",
         {
         vote_up : id,
         csrf_token : token
       },
       function(data, status){
              $("p.thumb-up").html(data);
          }
       );
     }
}

function thumbDown(element){
     var id = $(element).data("id");
     var dat = localStorage.getItem("thumb_for_" + id);
    var token = $("#csrf-token").val();
     if(dat == null){
       localStorage.setItem("thumb_for_" + id, "down");
       updateThumbs(".thumbs-container");
       $.post(
         "index.php",
         {
         vote_down: id,
         csrf_token : token
       },
       function(data, status){
              $("p.thumb-down").html(data);
          }
       );
     }
}

$(document).ready(function(){
   updateThumbs(".thumbs-container");
   $("a.thumbs-up").click(function(){
       thumbUp(this);
   });

   $("a.thumbs-down").click(function(){
       thumbDown(this);
   });
})
