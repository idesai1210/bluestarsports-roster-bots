<!doctype html>
<html lang="en">
<head>
    <title>Roster Bots | Blue Start Sports</title>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>


    <script type="text/javascript" src="../lib/angular-resource.js"></script>

    <script type="text/javascript" src="../lib/angular-route.js"></script>

    <script type="text/javascript" src="../lib/angular-ui-router.js"></script>

    <script type="text/javascript" src="../lib/ngDialog.js"></script>
    <script src="https://code.angularjs.org/1.6.1/angular-animate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/angular-toastr@2/dist/angular-toastr.tpls.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/angular-toastr@2/dist/angular-toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/angular-utils-pagination@0.11.1/dirPagination.js"></script>
    <link rel="stylesheet" ; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script type="text/javascript" src="../lib/ngStorage.js"></script>
    <script type="text/javascript" src="../js/services/rosterBotsService.js"></script>
    <script type="text/javascript" src="../js/mainRoutes.js"></script>
    <script type="text/javascript" src="../js/mainApp.js"></script>

    <!-- This is a copy of palette.js -->
    <script src="https://codepen.io/anon/pen/aWapBE.js"></script>
    <style type="text/css">
        h1,table,
        thead,
        tr,
        tbody,
        th,
        td {
            text-align: center;
        }


    </style>
</head>
<body ng-app="mainApp">
<div class="container">
    <ng-view></ng-view>
</div>
</body>
<script type="text/javascript">
    // Basic example
    $(document).ready(function () {
        $('#table').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

</html>
