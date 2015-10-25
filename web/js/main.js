jQuery(document).ready(function(e) {
    var t = !0;
    e("#main-menu-toggle").click(function() {
        if (e(this).hasClass("open")) {
            e(this).removeClass("open")
                .addClass("close");
            var t = e("#content").attr("class"), n = parseInt(t
                .replace(/^\D+/g, "")), r = n + 2, i = "span"
                + r;
            e("#content").addClass("full");
            e(".navbar-brand").addClass("noBg");
            e("#sidebar-left").hide()
        } else {
            e(this).removeClass("close")
                .addClass("open");
            var t = e("#content").attr("class"), n = parseInt(t
                .replace(/^\D+/g, "")), r = n - 2, i = "span"
                + r;
            e("#content").removeClass("full");
            e(".navbar-brand").removeClass(
                "noBg");
            e("#sidebar-left").show()
        }
    })
});

$(document).ready(function() {

    // Configuration des datatables
    $('.datatable').dataTable( {
        "iDisplayLength": 25,
        "bFilter": false,
        "scrollX": true,
        "language": {
            "url": "../../js/dataTables.french.lang"
        }
    });

    // Gestion des datepickers
    $('.date-picker').datetimepicker({
        viewMode: 'days',
        format: 'YYYY-MM-DD'
    });

    // Gestion des timepickers
    $('.time-picker').datetimepicker({
        format: 'HH:mm'
    });

    //Gestion des monthpickers
    /*$(".month-picker").datepicker( {
        format: "yyyy-mm",
        viewMode: "months",
        minViewMode: "months"
    });*/

    // Menu gauche déroulant
    $(".dropmenu").click(function(t) {
        t.preventDefault();
        var n = $(this).children().children();
        //alert(n.is(":visible"));
        if (n.hasClass("fa-chevron-down")){
            $("i", $(this)).removeClass("fa-chevron-down").addClass("fa-chevron-up");
        } else {
            $("i", $(this)).removeClass("fa-chevron-up").addClass("fa-chevron-down");
        }
        //n.is(":visible") ? $("i", $(this)).removeClass("fa fa-chevron-up").addClass("fa fa-chevron-down") : $("i", $(this)).removeClass("fa fa-chevron-down").addClass("fa fa-chevron-up");
        $(this).parent().find("ul").slideToggle();
    });


    // Ajout des classes "active" si c'est le cas
    $("ul.main-menu li a").each(function() {
        $($(this))[0].href == String(window.location) && $(this).parent().addClass("active");
    });

    // Si ouvert, on met la fleche correspondante
    $("ul.main-menu > li > ul li.active").each(function() {
        $(this).parent().parent().find("a > span > i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
    });

    $("ul.main-menu li ul li a").each(function() {
        if ($($(this))[0].href == String(window.location)) {
            $(this).parent().addClass("active");
            $(this).parent().parent().show()
        }
    });

    $(".btn-close").click(function(t) {
        t.preventDefault();
        $(this).parent().parent().parent().fadeOut()
    });

    // Bouton de settings
    $(".btn-setting").click(function(t) {
        t.preventDefault();
        $(".modal-settings").modal("show");
    })

    // Bouton minimiser
    $(".btn-minimize").click(function(t) {
        t.preventDefault();
        var n = $(this).parent().parent().next(".box-content");
        n.is(":visible") ? $("i", $(this)).removeClass("fa fa-chevron-up").addClass("fa fa-chevron-down") : $("i", $(this)).removeClass("fa fa-chevron-down").addClass("fa fa-chevron-up");
        n.slideToggle("slow", function() {
            widthFunctions()
        })
    });

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Notification lors de la génération d'un fichier csv
    $('#test_notification').click(function(){
        $.gritter.add({
            title: 'Generation file success!',
            text: 'La génération de votre fichier vient de se terminer. Vous pouvez le télécharger en accédant à <a href="#" style="color:#ccc">votre espace de téléchargement</a>.',
            image: 'img/new_file.png',
            sticky: false,
            time: ''
        });
        return false;
    });
});

function widthFunctions(e) {
    $(".timeline") && $(".timeslot").each(function() {
        var e = $(this).find(".task").outerHeight();
        $(this).css("height", e)
    });
    var t = $("#sidebar-left").outerHeight(), n = $("#content").height(), r = $(
        "#content").outerHeight(), i = $("header").height(), s = $("footer")
        .height(), o = $(window).height(), u = $(window).width();
    if (u > 767) {
        o - 80 > t && $("#sidebar-left").css("min-height", o - i - s);
        o - 80 > n && $("#content").css("min-height", o - i - s);
        $("#white-area").css("height", r)
    } else {
        $("#sidebar-left").css("min-height", "0px");
        $("#white-area").css("height", "auto")
    }
    u < 768 ? $(".chat-full") && $(".chat-full").each(function() {
        $(this).addClass("alt")
    }) : $(".chat-full") && $(".chat-full").each(function() {
        $(this).removeClass("alt")
    })
}

jQuery.fn.sortElements = (function(){
    var sort = [].sort;
    return function(comparator, getSortable) {
        getSortable = getSortable || function(){return this;};
        var placements = this.map(function(){
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
            // Since the element itself will change position, we have
            // to have some way of storing its original position in
            // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
            return function() {
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
            };
        });
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
    };
})();