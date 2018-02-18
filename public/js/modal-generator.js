/*!
 * modal-generator.js
 */
function showSimpleModal(userOptions) {
    var options = {
        id: 1,
        forceNew: false,
        size: 'large',
        title: '',
        body: '',
        cancelButton: true,
        buttons: [],
    };
    $.extend(true, options, userOptions);
    if ($('#modals').length === 0)
        $('body').append($('<div/>').prop('id', 'modals'));
    var modal = $('#' + options.id);
    if (options.forceNew === true && modal.length > 0)
        modal.remove();
    else if (modal.length > 0) {
        modal.modal('show');
        return;
    }
    var html = '<div class="modal fade" id="' + options.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel' + options.id + '" aria-hidden="true">';
    var size = '';
    if (options.size === 'small') size = ' modal-sm';
    if (options.size === 'large') size = ' modal-lg';
    html += '<div class="modal-dialog' + size + '">';
    html += '<div class="modal-content">';
    html += '<div class="modal-header">';
    html += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    html += '<h4 class="modal-title" id="myModalLabel' + options.id + '">' + options.title + '</h4>';
    html += '</div>';
    html += '<div class="modal-body">' + options.body + '</div>';
    html += '<div class="modal-footer">';
    if (options.cancelButton !== false)
        html += '<button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>';
    $.each(options.buttons, function (index, value) {
        html += value;
    });
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('#modals').append(html);
    $('#' + options.id).modal('show');
}