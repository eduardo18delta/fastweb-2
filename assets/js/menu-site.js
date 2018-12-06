$("document").ready(function(){

  $(".barrasResp").click(function(){
    $(".menuLateral").css("left","0")
    $(".fundoBlack").css("z-index","10")
    $(".fundoBlack").css("opacity","1")
  })

  $(".btn-close").click(function(){
    $(".menuLateral").css("left","-100%")
    $(".fundoBlack").css("opacity","0")
    $(".fundoBlack").css("z-index","-1")
  })
})
