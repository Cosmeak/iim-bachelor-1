$(function(){
    $(".minimized").click(function(){
        var img_src = $(this).attr('src');
        $(".lightbox").html("<img src='" + img_src + "' class='maximized'>");
        $(".lightbox").fadeIn("slow").css("display", "flex");
    });
    $(".lightbox").click(function(){
        $(".lightbox").fadeOut("fast");
    });
});