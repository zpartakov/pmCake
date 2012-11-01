<?php header('Content-type: text/calendar'); ?>

BEGIN:VCALENDAR

VERSION:2.0

X-WR-CALNAME:HTXEvent

X-WR-TIMEZONE:Europe/Copenhagen

CALSCALE:GREGORIAN

METHOD:PUBLISH

<?php echo $content_for_layout; ?>

END:VCALENDAR 
