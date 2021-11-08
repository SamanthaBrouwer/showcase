(function ($) {
  'use strict';

  var $window = $(window);

  /**
  * Document ready (jQuery)
  */
  $(function () {
    var wpzoomLazyLoadImagesInitEvent = function () {

      var event = document.createEvent('Event');
      var bodyEl = document.querySelector('body');

      event.initEvent('jetpack-lazy-images-load', true, true);
      bodyEl.dispatchEvent(event);

    };

    /**
     * Recipe Index infinite loading support.
     */
    var $folioitems = $('.foodica-index');

    if (typeof wpz_currPage != 'undefined' && wpz_currPage < wpz_maxPages) {
      $('.navigation').empty().append('<a class="btn btn-primary" id="load-more" href="#">Meer...</a>');

      $('#load-more').on('click', function (e) {
        e.preventDefault();
        if (wpz_currPage < wpz_maxPages) {
          $(this).text('Meer...');
          wpz_currPage++;

          $.get(wpz_pagingURL + wpz_currPage + '/', function (data) {
            var $newItems = $('.foodica-index article', data);

            $newItems.addClass('hidden').hide();
            $folioitems.append($newItems);
            $folioitems.find('article.hidden').fadeIn().removeClass('hidden');

            if ((wpz_currPage + 1) <= wpz_maxPages) {
                $('#load-more').text('Meer...');
            } else {
                $('#load-more').animate({height: 'hide', opacity: 'hide'}, 'slow', function () {
                    $(this).remove();
                });
            }

            //trigger jetpack lazy images event
            $( 'body' ).trigger( 'jetpack-lazy-images-load');
            wpzoomLazyLoadImagesInitEvent();
          });
        }
      });
    }
  });
})(jQuery);