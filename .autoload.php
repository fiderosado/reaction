<?php
/* sencilla clase autoload para tus proyectos sin usar composer
 * autor: Fidel Remedios Rosado
 * social: @fiderosado
 * Nota: Las clases deben ser declaradas en minusculas asi como los namespace, ej:
 * -> namespace utils; <-- la clase request esta en esta carpeta
 * -> use router\router; <-- clase router que se encuentra en una carpeta diferente fuera llamada .router
 * -> note que las carpetas tienen un punto para esconderlas, pero en los uses no se usa el punto
 * -> la funcion autoload modificada se encarga de arreglar las rutas.
 * -> class request{
 *     // esta clase esta en la carpeta .utils del proyecto
 *     // la cual llama a una clase router, y se llama perfectamente
 * -> }
 * -> Esta clase funciona de forma recursiva, solo se llama en el index.php principal.
 * -> Disfrutala..
 *  */

spl_autoload_register( function ($class) {
    $ap = array('');
    $ap = array_merge($ap, explode('\\', $class));
    $r = substr( implode('\.', $ap), 1) .'.php';
    include $r;
});

?>