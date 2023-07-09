<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kangaroo DataGrid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.1.3/css/dx.light.css">
    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.1.3/js/dx.all.js"></script>
</head>
<body class="dx-viewport">
    <div class="row">
        <div class="col-md-6 offset-3 mb-3" style="margin-top: 100px">
            <a class="btn btn-info" href="/" id="viewKangaroo">Kangaroo Management</a>
        </div>
        <div class="col-md-6 offset-3">
            <div id="gridContainer"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        $(() => {
            function retrieveKangarooInfo()
            {
                $.ajax({
                    url: '/api/kangaroo-info',
                    method: 'GET',
                    success: function(res){
                        let data = res.data;
                        const dataGrid = $('#gridContainer').dxDataGrid({
                            dataSource: data,
                            keyExpr: 'id',
                            showBorders: true,
                            sorting: {
                                mode: 'multiple',
                            },
                            columns: [
                                {
                                    dataField: 'name',
                                    caption: 'Name',
                                    sortOrder: 'asc',
                                    headerFilter: {
                                        search: {
                                            enabled: true,
                                        },
                                    },
                                }, {
                                    dataField: 'birthday',
                                    caption: 'Birthday',
                                    sortOrder: 'asc',
                                }, {
                                    dataField: 'weight',
                                    caption: 'Weight',
                                    sortOrder: 'asc',
                                }, {
                                    dataField: 'height',
                                    caption: 'Height',
                                    sortOrder: 'asc',
                                }, {
                                    dataField: 'friendliness',
                                    caption: 'Friendliness',
                                    sortOrder: 'asc',
                                },
                            ],
                        }).dxDataGrid('instance');
                    },
                    error: function(res){
                        alert('something went wrong while retrieving data');
                        console.log(res.responseJSON);
                        location.reload();
                    }
                });
            }
            retrieveKangarooInfo();

            // $('#positionSorting').dxCheckBox({
            //     value: false,
            //     text: 'Disable Sorting for the Position Column',
            //     onValueChanged(data) {
            //     dataGrid.columnOption(5, 'sortOrder', undefined);
            //     dataGrid.columnOption(5, 'allowSorting', !data.value);
            //     },
            // });
        });

    </script>
</body>
</html>