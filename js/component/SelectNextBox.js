var SelectNextBox = (function() {
    var that = { };
    that.clickAdd = function( target_1, target_2 ) {
        var list_to_add = [];
        $(target_1).children().each(function() {
            if ( $(this).is(":selected") ) {
                list_to_add.push({
                    "text" : $(this).text(),
                    "val" : $(this).val()
                });
                $(this).remove();
            }
        });
        for (var i = 0; i < list_to_add.length; i++) {
            var item = list_to_add[i];
            $(target_2).append(
                '<option value="'+item.val+'">'+item.text+'</option>'
            );
        }
    };
    that.clickRemove = function( target_1, target_2 ) {
        var list_to_add = [];
        target_1.children().each(function() {
            if ( $(this).is(":selected") ) {
                list_to_add.push({
                    "text" : $(this).text(),
                    "val" : $(this).val()
                });
                $(this).remove();
            }
        });
        for (var i = 0; i < list_to_add.length; i++) {
            var item = list_to_add[i];
            target_2.append(
                '<option value="'+item.val+'">'+item.text+'</option>'
            );
        }
    };
    return that;
})();
