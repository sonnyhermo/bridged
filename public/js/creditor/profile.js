$(document).ready(function(){
    $('#otherApplicationTable').DataTable({
        processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 10,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_banks',
    });
});
