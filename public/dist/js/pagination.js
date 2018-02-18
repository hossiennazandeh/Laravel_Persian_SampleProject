/**
 *
 * Created by Mahdi on 09/06/2017.
 */
function paginate(pagination, all_page, page_now, standard_page,path) {
    var path = path + "/";
    var next_page = page_now + 1;
    var prev_page = page_now - 1;
    $(pagination).append("<li class='previous'><a href='" + path+prev_page+"'> قبل</a></li>");
    if(page_now === 1){
        $(".previous > a").attr('href','');
        $(".previous").addClass("disabled");
    }
    if (all_page <= standard_page) {
        for (i = 1; i <= all_page; i++) {
            if (page_now === i) {
                $(pagination).append("<li class='active'><a href='" + path+i+"'>" + i + "</a></li>");
            } else {
                $(pagination).append("<li><a href='" + path+i+"'>" + i + "</a></li>");
            }
        }
    }
    else {
        var half_standard = Math.floor(standard_page / 2);
        if(page_now <=half_standard){
            if(page_now === all_page){
                $(".previous").addClass("disabled")
            }
            for (i = 1; i <= standard_page; i++) {
                if (page_now === i) {
                    $(pagination).append("<li class='active'><a href='" + path+i+"'>" + i + "</a></li>");
                } else {
                    $(pagination).append("<li><a href='" + path+i+"'>" + i + "</a></li>");
                }
            }
        }else if (page_now >=all_page-half_standard ){
            for (i = page_now - half_standard; i <= all_page; i++) {
                if (page_now === i) {
                    $(pagination).append("<li class='active'><a href='" + path+i+"'>" + i + "</a></li>");
                } else {
                    $(pagination).append("<li><a href='" + path+i+"'>" + i + "</a></li>");
                }
            }
        }
        else {
            for (i = page_now-half_standard; i <= page_now + half_standard; i++) {
                if (page_now === i) {
                    $(pagination).append("<li class='active'><a href='" + path+i+"'>" + i + "</a></li>");
                } else {
                    $(pagination).append("<li><a href='" + path+i+"'>" + i + "</a></li>");
                }
            }
        }
    }
    $(pagination).append("<li class='next'><a href='" + path+next_page+"'> بعد</a></li>");
    if(page_now === all_page){
        $(".next > a").attr('href','');
        $(".next").addClass("disabled")
    }
}