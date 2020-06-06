$(() => {
    $(document).ready(function() {
        var table = $('#example').DataTable({
            searchPanes: true
        });
        table.searchPanes.container().prependTo(table.table().container());
    });
});