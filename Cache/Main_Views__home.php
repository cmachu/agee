<body>

    <h1><?php echo $whoIsSimplest ?></h1>
    <!-- $whoIsSimplest is defined in /Apps/Main/Controller.php -->
    <h3>Simplest MVC framework on whole Earth!</h3>


    <?php foreach($categories as $category): ?>
        <a href="<?php echo $router->url('category_',[$category['id']]) ?>"><?php echo $category['name'] ?></a><BR>
    <?php endforeach ?>

</body>