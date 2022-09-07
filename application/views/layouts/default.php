<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>

		    <link rel="icon" href="/public/img/ico.png" type="image/x-icon">
        <link rel="stylesheet" href="/public/styles/bootstrap.min.css">
        <link rel="stylesheet" href="/public/styles/admin.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="/public/scripts/form.js"></script>
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
        <?php if ($this->route['action'] != 'login' && $this->route['action'] != 'register'): ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="/cabinet">Обліковий запис</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li style="padding:0.5em 0" class="nav-item">
                            <a style="padding:0 1em" class="nav-link" href="/createpost"><i class="fas fa-server"></i> <span class="nav-link-text">Аудит підприємства</span></a>
                            <a style="padding:0 1em" class="nav-link" href="/cabinet"><i class="fab fa-dyalog"></i> <span class="nav-link-text">Пройдені опитування</span></a>
                        </li> 
                        <li class="nav-item">
                            <a style="padding:0 1em" class="nav-link" href="/exit"><i class="fas fa-sign-out-alt"></i><span class="nav-link-text">Вихід</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>

        <?php echo $content; ?>

        <?php if ($this->route['action'] != 'login' && $this->route['action'] != 'register'): ?>
            <footer class="sticky-footer">
                <div class="container"><div class="text-center"><small>Обліковий запис</small></div></div>
            </footer>
        <?php endif; ?>
    </body>

    <script src="/public/styles/bootstrap.min.js"></script>

</html>