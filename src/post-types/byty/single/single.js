(function (namespace, $) {
  "use strict";

  // NOT EDITABLE BLOCK
    var PTBytySingle = function () {
      namespace.App.onReady(this);
    };
    var p = PTBytySingle.prototype;
    p.id = "pt-byty-single";
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

	namespace.PTBytySingle = new PTBytySingle;
}(window.Inoby, jQuery));
