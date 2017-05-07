jQuery(function(){

  // Set all variables to be used in scope
  var frame,
      metaBox = jQuery('form'), // Your meta box id here
      addImgLink = metaBox.find('.upload-custom-img'),
      delImgLink = metaBox.find( '.delete-custom-img'),
      imgContainer = metaBox.find( '.custom-img-container'),
      imgIdInput = metaBox.find( '.custom-img-id' );
   
  // ADD IMAGE LINK
  addImgLink.on( 'click', function( event ){
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false                                                     // Set to true to allow multiple files to be selected
    });

    frame.on( 'select', function() {                                      // When an image is selected in the media frame...
      var attachment = frame.state().get('selection').first().toJSON();   // Get media attachment details from the frame state

      // Send the attachment URL to our custom image input field.
      imgContainer.append( '<pre>   =>   </pre>' + 
                           '<img src="'+attachment.url+'" alt="" style="max-width:200px;"/>' +
                           '<input type="text" name="banner_image" value="'+attachment.url+'" style="display:none;"/>' );

      
      imgIdInput.val( attachment.id );      // Send the attachment id to our hidden input
      addImgLink.addClass( 'hidden' );      // Hide the add image link
      delImgLink.removeClass( 'hidden' );   // Unhide the remove image link
    });

    frame.open();                           // Finally, open the modal on click
  });
    
  // DELETE IMAGE LINK
  delImgLink.on( 'click', function( event ){
    event.preventDefault();
    imgContainer.html( '' );              // Clear out the preview image
    addImgLink.removeClass( 'hidden' );   // Un-hide the add image link
    delImgLink.addClass( 'hidden' );      // Hide the delete image link
    imgIdInput.val( '' );                 // Delete the image id from the hidden input
  });
});