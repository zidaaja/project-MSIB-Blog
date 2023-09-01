<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addJobdesk').on('click', function() {
            addJobdesk();
        });
        function addJobdesk() {
            var jobdesk = '<div><div class="form-group row mb-1 align-items-center"><div class="col-sm-2 text-end"><a href="javascript:;" class="remove link-danger"><i class="bi-x-circle"></i></a></div><div class="col-sm-10"><input type="text" class="form-control" name="name[]" value="" placeholder="Enter Category Name..." required></div></div></div>'
        $('.jobdesk').append(jobdesk);
        };
        $('.remove').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script>
