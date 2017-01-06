var MutiFileUploaderComponent = (function () {
	var self = {
        data : {
            "targElem" : ""
        }
    };
    self.init = function( target ) {
        if (target == 'undefined') {
            throw "missing target upload element"
            return;
        }
        self.data.targElem = $(target);
    }
	return self;
}());
