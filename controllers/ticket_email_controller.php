<?php
// Get many
$ticketEmails = $this->TicketEmail->find('all', array(
    // Set recursive to 1 to also gets attachments,
    // presented in a separate [Attachment][0] model.
    // Recursive attachments (someone forwarded an email as 
    // an attachment, which in turn had a pdf attached) are just
    // squashed to 1 list of files.
    'recursive' => -1,
    'conditions' => array(
        'answered' => 0,
        'deleted' => 0,
        'draft' => 0,
        'flagged' => 0,
        'recent' => 0,
        'seen' => 0,

    ),
));

#        'from' => 'kevin@true.nl',

print_r(compact('ticketEmails'));

// Get one
$ticketEmail = $this->TicketEmail->find('first', array(
    'conditions' => array(
        'id' => 21879,
    ),
));
print_r(compact('ticketEmail'));

// Get subject
$this->TicketEmail->id = 21879;
$subject = $this->TicketEmail->field('subject');
print(compact('subject'));

/*

// Delete one
$this->TicketEmail->delete(21879);

// Delete many

$this->TicketEmail->deleteAll(array(
    'deleted' => 0,
    'seen' => 0,
    'from' => 'kevin@true.nl',
));
*/