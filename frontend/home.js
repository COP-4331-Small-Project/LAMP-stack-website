$(() => {
    $(document).ready(function() {
        let table = $('#example').DataTable({
            searchPanes: true
        });
        table.searchPanes.container().prependTo(table.table().container());
    });
});