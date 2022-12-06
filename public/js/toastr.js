// @props(['message'])

<script>
  @if (session('message'))
      $(function() {
          toastr.options = {
            // "positionClass": "“toast-bottom-right”"
          }
          toastr.info('{{ session('message') }}');
      });
  @endif
</script>