(function ($, undefined) {
    $(document).ready(function () {
        $(".cross").hide();
        $(".menu").hide();
        $(".hamburger").click(function () {
            $(".menu").slideToggle("slow", function () {
                $(".hamburger").hide();
                $(".cross").show();
            });
        });

        $(".cross").click(function () {
            $(".menu").slideToggle("slow", function () {
                $(".cross").hide();
                $(".hamburger").show();
            });
        });


        $(".fa-search").toggle(function () {
                // Отображаем скрытый блок

                $("#search").animate({
                    width: "toggle"
                });
            },
            function () {
                // Скрываем блок
                $("#search").animate({
                    width: "toggle"
                });// fadeOut - плавное исчезновение
            }); // end of toggle()

    });
})(jQuery);



