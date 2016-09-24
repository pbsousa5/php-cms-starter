jQuery(document).ready(function($) {
    var options = { 
        beforeSubmit:  showRequest,
        success:       showResponse
    }; 
    $('.ajax_form').ajaxForm(options); 
}); 

function showRequest(formData, jqForm, options) { 
    return true; 
} 
function showResponse(responseText, statusText, xhr, $form)  { 

} 