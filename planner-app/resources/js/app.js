import './bootstrap';
$(() => {
    $('#update-source').fadeOut();
    $( "#btn-new-source" ).fadeOut();
    $('.edit-source').on('click', function () {
        $('#create-source').fadeOut();
        $('#update-source').fadeIn();
        $( "#btn-new-source" ).fadeIn();
        let r=$(this).closest('.div-link').find('.source-link');
        $('#update-source input[name=description]').val(r.html());
        $('#update-source input[name=link]').val(r.attr('href'));
        let action=$('#create-source form').attr('action');
        $('#update-source form').attr('action',`${action}/${r.data('id')}`);
    });
    $('#btn-new-source').on('click', function () {
        $('#create-source').fadeIn();
        $('#update-source').fadeOut();
        $( "#btn-new-source" ).fadeOut();
    });
// student
    $('#update-student').fadeOut();
    $( "#btn-new-student" ).fadeOut();
    $('.edit-student').on('click', function () {
        $('#create-student').fadeOut();
        $('#update-student').fadeIn();
        $( "#btn-new-student" ).fadeIn();



        let group=$(this).data('group');
        let name=$(this).data('st');
        $('#update-student select').val(group);
        $('#update-student input[name=name]').val(name);

    });
    $('#btn-new-student').on('click', function () {
        $('#create-student').fadeIn();
        $('#update-student').fadeOut();
        $( "#btn-new-student" ).fadeOut();
    });
});
