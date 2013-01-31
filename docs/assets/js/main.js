$(document).ready(function(){
  
  $('table.layout tr td.navigation > ul > li > a').live('click',function() {
    $('table.layout tr td.navigation > ul > li > a').removeClass('active');
    $(this).addClass('active');
  });
  $('a').live('click',function() {
    
    if ($(this).attr('href').indexOf('http://') == 0) {
      $(this).attr('rel','external');
    }
    
    if($(this).attr('onclick')==undefined) {
      var rel = $(this).attr('rel');
      var href = trim($(this).attr('href'),'/');
      if (rel != 'external') {
        if (rel == 'module') {
          if (href.indexOf("/") == -1)
            $('#main').eq(0).html('<table class="layout"><tbody><tr><td class="navigation" id="navigation"></td><td class="gap">&nbsp;</td><td class="content" id="content"></td></tr></tbody></table>');
          var target = 'module';
        } else if (rel !== 'undefined' && rel !== false) {
          var target = 'script';
        }
        
        if (rel != 'manual') {
          var href = trim($(this).attr('href'),'/');
          crypt_ajax({
            data: target+"="+href,
            dataType: "json",
            mode: "auto"
          });
        }
        return false;
      }
    }
  });
  $(window).resize(function() {
    $('#main').height($(window).height()-180);
    $('table.layout tr td.content').height($(window).height()-220);
  });
});

var aes_key = '00000000';
var curHeight = $(window).height();
function fatalError (code) {
  window.location = "/login/"+code+"/";
}

