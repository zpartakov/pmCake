$(function() {
    $('.taskedit').editable('/pm_tasks/updateTitle', {
         id        : 'data[Task][id]',
         name      : 'data[Task][name]',
         type      : 'text',
         cancel    : 'Efface',
         submit    : 'Sauver',
         tooltip   : 'Cliquer pour éditer le titre'
    });
});