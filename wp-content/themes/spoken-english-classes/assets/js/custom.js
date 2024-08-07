jQuery( document ).ready(function() {
  jQuery("h2.banner-title").each(function() {
    var t = jQuery(this).text();
    var splitT = t.split(" ");
    var halfIndex = 2;
    var newText = " ";
    for(var i = 0; i < splitT.length; i++) {
      if(i == halfIndex) {
        newText += "<span style='color:#e96767'>";
        newText += splitT[i] + " ";
        newText += "</span>";
      }else{
        newText += splitT[i] + "  ";
      }      
    }    
    jQuery(this).html(newText);
  });
  jQuery("h2.banner-title2").each(function() {
    var t = jQuery(this).text();
    var splitT = t.split(" ");
    var halfIndex = 0;
    var newText = " ";
    for(var i = 0; i < splitT.length; i++) {
      if(i == halfIndex) {
        newText += "<span style='color:#e96767'>";
        newText += splitT[i] + " ";
        newText += "</span>";
      }else{
        newText += splitT[i] + "  ";
      }      
    }    
    jQuery(this).html(newText);
  });
});