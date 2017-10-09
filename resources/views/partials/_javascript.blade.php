<script src="/js/parsley.min.js" type="application/javascript"></script>
<script src="/Popup-master/assets/js/jquery.popup.min.js" type="application/javascript"></script>
<script src="\js\jquery-ui.min.js" type="application/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="/js/select2.full.min.js"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 300,
            constrainWidth: true, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: true // Stops event propagation
        });
        $('.material_select').material_select();
        $('.select2').select2({
            tags: true
        });
    });
</script>