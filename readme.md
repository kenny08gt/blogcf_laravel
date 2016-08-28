#Controladores y vistas
Para enviar variable a una vista de blade

return view('carpeta.vista',['variable'=> $var_php]);

y en la vista obtenerla como si fuera una var local

echo $variable->valor|campo ó
{{ $variable->campo}}

Para generar un controlador con todos sus metodos
php artisan make:controller nombre_controlador --resource
https://laravel.com/docs/5.2/controllers#restful-resource-controllers

#Otros paquetes
eloquet https://github.com/cviebrock/eloquent-sluggable
sluggable, poner rutas mas faciles

html forms, https://laravelcollective.com/docs/5.2/html
para hacer html con codigo

#Otros
Modelos en singular, controladores en plural

#Para cambiar la carpeta publica en c9
sudo nano /etc/apache2/sites-enabled/001-cloud9.conf

#Para jalar un id de un objeto guardando antes
$article=new Article($request->all());
$article->user_id=\Auth::user()->id;
$article->save();
        
$image=new Image();
$image->name=$name;
$image->article()->associate($article);//para llenar la llave foranea de article_id
$image->save();

#Para mandar una lista de algo al un select
$tags->list('columna1','columna2');