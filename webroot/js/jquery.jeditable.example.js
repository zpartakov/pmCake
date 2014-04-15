$(function() {
    $('.taskedit').editable('/tasks/sauvetitre', {
         id        : 'data[Task][id]',
         name      : 'data[Task][name]',
         type      : 'text',
         cancel    : 'Efface',
         submit    : 'Sauver',
         tooltip   : 'Cliquer pour éditer le titre'
    });
});