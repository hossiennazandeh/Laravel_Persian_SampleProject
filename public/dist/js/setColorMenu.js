/**
 * Created by Elf on 21/06/2017.
 */
$(document).ready(function () {
    var list_ ;
    $('button[name="change_design"]').click(function () {
        var list_new;
        var new_color = $sidebar.attr('data-active-color');
        var new_color_back = $sidebar.attr('data-background-color');
        var status_image;
        var status_body_min;
        if ($sidebar.attr('data-image') == undefined) {
            status_image = 0
        } else {
            status_image = 1;
            var new_image = $sidebar_img_container.css('background-image');

        }
        if ($('body').attr('class') == 'sidebar-mini') {
            status_body_min = 1;
        } else {
            status_body_min = 0;
        }
        list_new = {
            new_color: new_color,
            new_image: new_image,
            new_color_back: new_color_back,
            status_image: status_image,
            status_body_min: status_body_min
        };
        console.log(list_new);
        Cookies.remove('list_design');
        Cookies.set('list_design', list_new);
    });
    list_ = JSON.parse(Cookies.get('list_design'));
    console.log(list_.new_color);
    if (list_ == undefined) {
    } else {
        $sidebar.attr('data-active-color', list_.new_color);
        $sidebar.attr('data-background-color', list_.new_color_back);
        if (list_.status_image == 1) {
            $sidebar.attr('data-image', list_.new_image);
            $('.switch-sidebar-image input').prop('checked', true);
        } else {
            $sidebar.removeAttr('data-image', '#');
            $('.switch-sidebar-image input').prop('checked', false);
        }
        if (list_.status_body_min == 0) {
            $('body').addClass("sidebar-mini");
            $('.switch-sidebar-mini input').prop('checked', true);
        }else {
            $('.switch-sidebar-mini input').prop('checked', false);
        }


    }
});