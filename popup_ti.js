jQuery(document).ready(function(){
/******************Show title content click on title on single page*************/
jQuery(document).on("mouseup","#productt_heading_titlee h2.elementor-heading-title,.elementskit-card-body h2,span.page_bread_title:last-child",function(){
var selection_txt = window.getSelection();
if(selection_txt == ""){  
}
else{
jQuery('.title_hover_test').show();
}
 
});	
jQuery(document).on("click","span.close_tit_popup",function(){
jQuery('.title_hover_test').hide();	
});

/* jQuery('.woocommerce-breadcrumb a:last-child ').append('<span>Test</span>');
console.log(jQuery('.woocommerce-breadcrumb').text()); */
/* jQuery('<div></div>').insertAfter(jQuery('.woocommerce-breadcrumb a:last-child').last());
 */
jQuery("nav.woocommerce-breadcrumb").contents()
    .filter(function () {
    // get only the text nodes
    return this.nodeType === 3 && this.nodeValue.trim() !== "";
}).wrap("<span class='page_bread_title'>");
});  