$(document).ready(function(){
   $(document)
   .on('click', '[data-track="ga"]', function(){
      var $track = $(this);
      ga('send', 'event', $track.attr("track-cat"), $track.attr("track-action"), $track.attr("track-label"))
   })
   $(document)
   .on('click', '[data_track="buttonafl"]', function(){
      fbq('track', 'Lead')
   })
});