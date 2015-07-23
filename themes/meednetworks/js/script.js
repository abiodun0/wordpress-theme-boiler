
$(function(){
  
  var scrollTop = function() {
    return $("html, body").animate({
      scrollTop: 0
    }, 800, "linear")
  }

  $("[data-toggle~=waypoints]").each(function() {
      var a, n, o, s, t;
      o = $(this).data("marker") ? $(this).data("marker") : this;
      s = $(this).data("offset") ? $(this).data("offset") : "80%";
      t = $(this).data("showanim") ? $(this).data("showanim") : "fadeIn";
      n = $(this).data("hideanim") ? $(this).data("hideanim") : false;
      a = $(this).data("trigger-once") ? $(this).data("trigger-once") : false;
      return $(o).waypoint(function(s) {
        "down" === s && $(this).removeClass(n + " animated").addClass(t + " animating").on("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
          return $(this).removeClass("animating").addClass("animated").removeClass(t)
        })
        return "up" === s && n !== !1 && $(this).removeClass(t + " animated").addClass(n + " animating").on("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
          return $(this).removeClass("animating").removeClass("animated").removeClass(n)
        })
      }, {
        offset: s,
        triggerOnce: a,
        continuous: true
      })
    })

    $("#testimonials").owlCarousel({
        autoPlay: true,
        autoHeight: true,
        singleItem: true
      })

    $("[data-toggle~=unveil]").unveil(200, function() {
        return $(this).load(function() {
          return $(this).addClass("unveiled")
        })
      })
      $(window).stellar({
        horizontalScrolling: false
      })

     $("#methodology").owlCarousel({
                autoPlay: true,
                addClassActive: true,
                pagination: true,
                items: 5,
                itemsCustom: [[0, 1], [320, 1], [480, 2], [700, 3], [975, 4], [1200, 4], [1400, 5], [1600, 5]]
              })

     $("#partners").owlCarousel({
                autoPlay: true,
                addClassActive: true,
                pagination: false,
                items: 7,
                itemsCustom: [[0, 1], [320, 1], [480, 2], [700, 3], [975, 4], [1200, 5], [1400, 6], [1600, 7]]
              })

     var map, marker;
      map = new GMaps({
        el: "#gmaps-marker",
        lat: 9.062656,
        lng: 7.466859
      })
      marker = map.addMarker({
        lat: 9.062656,
        lng: 7.466859,
        title: "Meed Networks Ltd",
        infoWindow: {
          content: "<b>Meed Networks Ltd.</b><br>" + $(".mb15 address").html()
        }
      })
      marker.infoWindow.open(map, marker)

      






})