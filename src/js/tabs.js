if (document.location.search.match(/type=embed/gi)) {
  window.parent.postMessage('resize', "*");
}
__bindToLinks();

$(".tab_content").hide();
$(".tab_content:first").show();

/* if in tab mode */
$("ul.tabs li").click(function () {

  $(".tab_content").hide();
  var activeTab = $(this).attr("rel");
  $("#" + activeTab).fadeIn();

  $("ul.tabs li").removeClass("active");
  $(this).addClass("active");

  $(".accordion_heading").removeClass("d_active");
  $(".accordion_heading[rel^='" + activeTab + "']").addClass("d_active");

});
/* if in drawer mode */
$(".accordion_heading").click(function () {

  $(".tab_content").hide();
  var d_activeTab = $(this).attr("rel");
  $("#" + d_activeTab).fadeIn();

  $(".accordion_heading").removeClass("d_active");
  $(this).addClass("d_active");

  $("ul.tabs li").removeClass("active");
  $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
});

/* here's where the autoscroll magic happens :) */
$('.accordion_heading').bind('click', function () {
  var self = this;
  setTimeout(function () {
    theOffset = $(self).offset();
    $('body,html').animate({
      scrollTop: theOffset.top - 50
    });
  }, 310);
});

