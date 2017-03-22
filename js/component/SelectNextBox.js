var SelectNextBox = (function() {
    var that = { eleStart : null, eleEnd : null };
    that.init = function( ) {
        that.eleStart = $("#nextbox_start");
        that.eleEnd = $("#nextbox_end");
    };
    that.clickAdd = function() {
        var list_to_add = [];
        that.eleStart.children().each(function() {
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
            this.eleEnd.append(
                '<option value="'+item.val+'">'+item.text+'</option>'
            );
        }
    };
    that.clickRemove = function() {
        var list_to_add = [];
        that.eleEnd.children().each(function() {
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
            this.eleStart.append(
                '<option value="'+item.val+'">'+item.text+'</option>'
            );
        }
    };
    return that;
})();
