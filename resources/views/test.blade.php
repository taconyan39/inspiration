<input id="file-sample" type="file">
<img id="file-preview">

<script>



    document.getElementById('file-sample').addEventListener('change', function(e){
        var file = e.target.files[0];

        var blobUrl = window.URL.createObjectURL(file);

        var img = document.getElementById('file-preview');
        img.src = blobUrl;
    })
</script>