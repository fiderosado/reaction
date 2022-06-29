# reaction
PHP &amp; JavaScript Framework

##########################################

Acordeon Component

El acordeón utiliza la funcionalidad de colapso para hacer que se pliegue y se despliegue.

Los acordeones son útiles cuando necesita organizar mucha información en un espacio limitado verticalmente. Los encabezados permiten al usuario explorar los temas principales del contenido y elegir cuál de los temas le gustaría examinar en profundidad haciendo clic en él. Es muy útil para preguntas frecuentes y formularios de contacto complejos.

Flush

La propiedad Flush le permite mostrar el acordeón sin el color de fondo predeterminado, los bordes y las esquinas redondeadas. También hace que se estire en todo el ancho de su contenedor principal. Es útil cuando desea incrustar el acordeón en un componente diferente, es decir, dentro de una Card or Modal.

->type(['flush'])

Siempre abierto
De forma predeterminada, un elemento de acordeón se colapsará cuando haga clic en otro elemento de acordeón. Si desea cambiarlo y mantener abiertos los elementos del acordeón hasta que se haga clic en ellos explícitamente, puede cambiarlos de esta forma

->type(['always-open'])

Puedes usar varios tipos usando
->type(['flush','always-open'])

##########################################

Avatar component

avatar_tw::in()

Avatar receptivo creado. un avatar de círculo, cuadrado, perfil.

Básico:

Los avatares son representaciones visuales 
de personas o entidades y, a menudo, 
se muestran en listas o tarjetas.

->type(['basic'])

la funcion esta declarada pero no es necesario declararla 
ya que por defecto se mantiene el tipo basico.
puedes agregar sombras o contenido de texto en las propiedades

avatar_tw::in()->type(['squared','shadow','content'])->setTitule('Mi nombre')->setDescription('Webmaster')

Imagen del avatar:

 avatar_tw::in()->type(['squared','shadow','content'])
                    ->setTitule('Mi nombre')
                    ->setDescription('Webmaster')
                    ->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')
					
en esta declaracion agregas una ruta relativa a la imagen,
 igualmente puede ser una ruta local en el servidor.					

Cuadrado
El tipo squared para hacer avatares cuadrados con esquinas redondeadas.

avatar_tw::in()->type(['squared'])->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')

Con contenido:
Combine fácilmente el componente de avatar con contenido 
como un nombre de usuario y una breve descripción.
 avatar_tw::in()->type(['content'])
						->setTitule('Mi nombre')
						->setDescription('Webmaster')
						->setImgScr('https://mdbcdn.b-cdn.net/img/new/avatars/8.webp')


Error:

->type(['basic','squared'])

el tipo basico y squared no pueden estar declarados al mismo tiempo
