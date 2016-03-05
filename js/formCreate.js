function ConvertFormToJSON(form){
  var array = jQuery(form).serializeArray();
  var json = {};
  
  jQuery.each(array, function() {
    json[this.name] = this.value || '';
  });
  
  return json;
}

jQuery(document).on('ready', function() {
  jQuery('form#add-new-monitor').bind('submit', function(event){
    event.preventDefault();
    
    var form = this;
    var json = ConvertFormToJSON(form);
    
    $.ajax({
      type: "POST",
      url: "https://api.uptimerobot.com/newMonitor",
      data: json,
      dataType: "json"
    });
    
    
  })
}
                   )