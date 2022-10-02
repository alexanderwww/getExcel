<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>



    <h1>Get File Excel in JavaScript</h1>


    <input type="button" id='btn' name="" value="nombreUsuario">

    
    <script type="text/javascript">
        
        const url='excel.php';

        // ----------------------------------------------------------------------------

        let btn=document.getElementById('btn');

        btn.addEventListener('click',()=>{
            // getExcelFetch();
            getExcelForm();

        })

        function getExcelFetch(){

            fetch(url,{
                method: 'POST',
            })
            .then(response=>response.blob())
            .then(response=>{
                let link = document.createElement('a');
                link.download = 'FileName';
                link.href = URL.createObjectURL(response);
                link.click();
                URL.revokeObjectURL(link.href);
            })

        }


        function getExcelForm(){

                let routeDownload =url;
                            
                var form = document.createElement("form");
                form.setAttribute("method", "get");
                form.setAttribute("action", routeDownload);
            
                // Data POST 
                // var input = document.createElement("input");
                // input.type = "hidden";
                // input.name = "departamento";
                // input.value = "Soccer;
                // form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
                document.body.removeChild(form);
        };

        // ----------------------------------------------------------------------------

    

    </script>


</body>
</html>