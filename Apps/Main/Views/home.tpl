<body>

    <h1>{{=$whoIsSimplest}}</h1>
    <!-- $whoIsSimplest is defined in /Apps/Main/Controller.php -->
    <h3>Simplest MVC framework on whole Earth!</h3>


    {{foreach($categories as $category):}}
        <a href="{{=$router->url('category_',[$category['id']])}}">{{=$category['name']}}</a><BR>
    {{endforeach}}
    <BR><BR>
    <input type="text" {{=Input::value('test')}}>
</body>