/*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Add New Post Template
 |--------------------------------------------------------------------------
 */

'use strict';

(function ($) {
  $(document).ready(function () {

    var toolbarOptions = [
      [{ header: [1, 2, 3, 4, 5, false] }],
      ["bold", "italic", "underline", "strike"], // toggled buttons
      ["blockquote", "code-block"],
      [{ header: 1 }, { header: 2 }], // custom button values
      [{ list: "ordered" }, { list: "bullet" }],
      [{ script: "sub" }, { script: "super" }], // superscript/subscript
      [{ indent: "-1" }, { indent: "+1" }], // outdent/indent                                       // remove formatting button
      ["link", "image", "video"],
      [{
        'color': []
      }, {
        'background': []
      }],
       [{
         'size': ['small', false, 'large', 'huge']
       }],
       [{
         'font': []
       }],
       [{
         'align': []
       }],
    ];

    // Init the Quill RTE
    var quill = new Quill('#editor-container', {
      modules: {
        toolbar: toolbarOptions
      },
      placeholder: 'Type here...',
      theme: 'snow'
    });

  });
})(jQuery);
