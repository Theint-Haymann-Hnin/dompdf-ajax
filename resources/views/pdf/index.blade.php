<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 PDF File Download using JQuery Ajax Request Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    @include('pdf.pdf')
    <div class="text-center pdf-btn">
        <button type="button" class="btn btn-info download-pdf">Download Pdf</button>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".download-pdf").click(function() {
        alert('yes');
        function downloadFile(response ,s, xhr) {
            console.log(response);
            var blob = new Blob([response], {
                type: 'application/pdf'
            })
            var url = URL.createObjectURL(blob);
            location.assign(url);
            // link.download = xhr.getResponseHeader('File-name');
        }

        $.ajax({
                url: "generate",
                method: 'GET',
                xhrFields: {
                            responseType: 'blob'
                        },
            })
            .done(downloadFile);
    });
</script>

</html>
