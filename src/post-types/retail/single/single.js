(function (namespace, $) {
  "use strict";

  // NOT EDITABLE BLOCK
    var PTRetailSingle = function () {
      namespace.App.onReady(this);
    };
    var p = PTRetailSingle.prototype;
    p.id = "pt-retail-single";
  // END OF NOT EDITABLE BLOCK

	p.initialize = function () {
    // enter code here
    var lightbox = GLightbox();
        lightbox.on('open', (target) => {
            console.log('lightbox opened');
        });
        var lightboxDescription = GLightbox({
            selector: '.glightbox5',
            descPosition: 'top',
        });
  };

	namespace.PTRetailSingle = new PTRetailSingle;
}(window.Inoby, jQuery));
