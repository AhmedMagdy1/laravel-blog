/*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Add New Post Template
 |--------------------------------------------------------------------------
 */

'use strict';

(function ($) {
  $(document).ready(function () {

    var toolbarOptions = [
      [{ 'header': [1, 2, 3, 4, 5, false] }],
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block'],
      [{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent                                       // remove formatting button
    ];

    // Init the Quill RTE
    // var quill = new Quill('#editor-container', {
    //   modules: {
    //     toolbar: toolbarOptions
    //   },
    //   placeholder: 'Words can be like x-rays if you use them properly...',
    //   theme: 'snow'
    // });

      // tinymce.init({
      //     selector: '#mytextarea',
      //     rel_list: [
      //         { title: 'None', value: '' },
      //         { title: 'No Follow', value: 'nofollow' },
      //         { title: 'No Follow No Opener No Referrer', value: 'nofollow noopener noreferrer' },
      //         { title: 'No Opener No Referrer', value: 'noopener noreferrer' },
      //         { title: 'UGC', value: 'ugc' },
      //         { title: 'Sponsored', value: 'sponsored' }
      //     ]
      // });
      tinymce.init({
          selector: '#mytextarea',  // change this value according to your HTML
          plugins: 'link preview table code',
          height: 800,
          //     plugins: 'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
          menubar: 'file edit view insert format tools table tc help',
          toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | link anchor | ltr rtl | preview',
          rel_list: [
              { title: 'None', value: '' },
              { title: 'No Follow', value: 'nofollow' },
              { title: 'No Follow No Opener No Referrer', value: 'nofollow noopener noreferrer' },
              { title: 'No Opener No Referrer', value: 'noopener noreferrer' },
              { title: 'UGC', value: 'ugc' },
              { title: 'Sponsored', value: 'sponsored' }
          ]
      });
      $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
          $(e.target)
              .prev()
              .find("i:last-child")
              .toggleClass("fa-minus fa-plus");
      });
      //collapse
      $( '.closeall' ).click( function( e ) {
          e.preventDefault();
          $( '.accordion .collapse.show' ).collapse( 'hide' );
          return false;
      } );
      $( '.openall' ).click( function( e ) {
          e.preventDefault();
          $( '.accordion .collapse' ).collapse( 'show' );
          return false;
      } );

      if ( window.location.hash ) {
          redirect( window.location.hash );
      }

      $( 'a[href^="#"]' ).on( 'click', function( e ) {
          e.preventDefault();
          var a = document.createElement( 'a' );
          a.href = this.href;
          redirect ( a.hash );
          return false;
      } );

      function redirect( hash ) {
          // $( hash ).attr( 'aria-expanded', 'true' ).focus();
          // $( hash + '+div.collapse' ).addClass( 'show' ).attr( 'aria-expanded', 'true' );
          $( hash + '+div.collapse' ).collapse( 'show' );

          // using this because of static nav bar space
          $( 'html, body' ).animate( {
              scrollTop: $( hash ).offset().top - 60
          }, 10, function() {
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
          } );
      }

      document.documentElement.setAttribute("lang", "en");
      document.documentElement.removeAttribute("class");
      //end collapse

      // var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
      //
      // tinymce.init({
      //     selector: 'textarea#mytextarea',
      //     plugins: 'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
      //     mobile: {
      //         plugins: 'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap quickbars emoticons'
      //     },
      //     menu: {
      //         tc: {
      //             title: 'Comments',
      //             items: 'addcomment showcomments deleteallconversations'
      //         }
      //     },
      //     menubar: 'file edit view insert format tools table tc help',
      //     toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor casechange removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
      //     autosave_ask_before_unload: true,
      //     autosave_interval: '30s',
      //     autosave_prefix: '{path}{query}-{id}-',
      //     autosave_restore_when_empty: false,
      //     autosave_retention: '2m',
      //     image_advtab: true,
      //     link_list: [
      //         { title: 'My page 1', value: 'https://www.tiny.cloud' },
      //         { title: 'My page 2', value: 'http://www.moxiecode.com' }
      //     ],
      //     image_list: [
      //         { title: 'My page 1', value: 'https://www.tiny.cloud' },
      //         { title: 'My page 2', value: 'http://www.moxiecode.com' }
      //     ],
      //     image_class_list: [
      //         { title: 'None', value: '' },
      //         { title: 'Some class', value: 'class-name' }
      //     ],
      //     importcss_append: true,
      //     templates: [
      //         { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
      //         { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
      //         { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
      //     ],
      //     template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
      //     template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
      //     height: 600,
      //     image_caption: true,
      //     quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
      //     noneditable_noneditable_class: 'mceNonEditable',
      //     toolbar_mode: 'sliding',
      //     spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
      //     content_style: '.mymention{ color: gray; }',
      //     contextmenu: 'link image imagetools table configurepermanentpen',
      //     a11y_advanced_options: true,
      //     skin: useDarkMode ? 'oxide-dark' : 'oxide',
      //     content_css: useDarkMode ? 'dark' : 'default',
      // });



  });
})(jQuery);
