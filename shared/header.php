<!DOCTYPE html>
<html>
    <head>
        <title>PHP To-Do</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
        <style>
            .spacer {
                margin-bottom: .5rem;
            }
            .add-item-form {
                max-width: 20rem;
                display: flex;
                flex-direction: column;
            }
            .edit-item-form {
                max-width: 20rem;
                display: flex;
                flex-direction: column;
            }
            .list-item {
                display: flex;
                margin-bottom: .5rem;
            }
            .list-item-view {
                margin: auto 0;
            }
            .remove-item-form {
                margin-right: 1rem;
            }
        </style>
    </head>
    <body>
        <nav class="navbar text-bg-primary mb-3">
            <div class="container text-bg-primary">
                <span class="navbar-brand mb-0 h1 text-bg-primary">PHP To Do App</span>
            </div>
        </nav>