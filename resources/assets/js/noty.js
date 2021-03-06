function noty_flash(text, type) {
    //success, info, warning, error
    var icon;
    //
    switch(true){
        case (type=='success'):
            icon = '<i class="fa fa-check"></i>';
            break;
        case (type=='info'):
            icon = '<i class="fa fa-bell"></i>';
            break;
        case (type=='warning'):
            icon = '<i class="fa fa-exclamation-circle"></i>';
            break;
        case (type=='error'):
            icon = '<i class="fa fa-ban"></i>';
            break;
        default:
            icon = '<i class="fa fa-bell"></i>';
    }

    if (type === 'undefined'){
        type = 'information';
    }

    var n = noty({
        text: text,
        type: type,
        dismissQueue: true,
        layout: 'bottomLeft',
        theme: 'bootstrapTheme',
        template: '<div class="noty_message">'+ icon +' <span class="noty_text"></span><div class="noty_close"></div></div>',
        animation: {
            open: 'animated bounceInLeft',
            close: 'animated bounceOutLeft',
            easing: 'swing',
            speed: 500
        }
    });
};