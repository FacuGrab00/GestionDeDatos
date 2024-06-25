# Gestion de datos - Trabajo integrador
Materia de 4to año de la carrera de ingeniería en sistemas

# Trabajo integrador final
Consiste en crear una base de datos aplicando todos los conceptos aprendidos durante el cursado de la materia

## CONSIGNA
ESCENARIO: Cadena de agencias inmobiliarias

Una cadena de agencias inmobiliarias de reciente creación necesita una Base de Datos para la gestión a nivel nacional de sus inmuebles y clientes. Para ello, nos ha proporcionado los siguientes requisitos que deben ser volcados en la Base de Datos.

Existen diversas agencias inmobiliarias en distintas ciudades todas ellas con el mismo nombre. Sobre las agencias se quiere almacenar el código de agencia, dirección, teléfono y director de la misma. Cada agencia dispone de un conjunto de inmuebles (viviendas, locales comerciales y campos) caracterizados por un código de inmueble, una dirección, un precio de venta y un propietario que puede ser o bien la propia agencia o bien el cliente que desea vender un inmueble y para ello recurre a la agencia inmobiliaria.

Además, cada tipo de inmueble tiene sus propias características. Las viviendas se caracterizan por una superficie, número de habitaciones y baños, si incluye plaza de garaje y una breve descripción; sobre los locales comerciales se guarda información sobre su área y uso al que han sido destinados (en caso de que se hayan utilizado) y, por último, de los campos también se guarda su superficie y si está urbanizada.

Cada agencia controla un conjunto de inmuebles que interesa tener agrupados por ciudades y por zonas dentro de cada ciudad. Una determinada zona de una ciudad sólo es controlada por una agencia. Los inmuebles pueden estar disponibles para que los clientes interesados puedan visitarlos, reservados si algún cliente ha mostrado su interés y ha entregado una señal a cuenta (con lo que no podrá estar disponible para otros clientes) o bien vendido en cuyo caso desaparecerá de la base de datos y se almacenará en otra que no es objeto de este examen.

Interesa almacenar información sobre las dos actividades que se desarrollan en cada agencia. Por un lado ofrece a sus clientes la posibilidad de adquirir un inmueble y, por otro, permite que sus clientes puedan vender sus inmuebles. Cuando un cliente se registra en una agencia se le asigna un agente comercial que se encargará de gestionar la búsqueda o venta de inmuebles. En ocasiones, un cliente puede figurar en varias agencias (siempre con el mismo código de cliente) y tener asignado un agente en cada una de ellas (porque pueda estar interesado en inmuebles de distintas zonas controladas por distintas agencias).

Para los clientes que buscan un inmueble se almacenan sus preferencias en cuanto a la localidad(es), zona(s) en las que están interesados, tipo de inmueble y fecha en que desea  adquirirlo y algunas características generales, como un rango de precios y el número de habitaciones. Puesto que un cliente podría estar interesado en adquirir más de un inmueble y de distintos tipos, las preferencias se identificarán por cada cliente con un número en secuencia. Por otro lado, puede ocurrir que un mismo cliente quiera vender un inmueble y al mismo tiempo buscar otro.

De los clientes de cada agencia se registrará su DNI, nombre, dirección, fecha de registro en la agencia y teléfono de contacto. Para los clientes que desean poner a la venta un inmueble, se les solicitará las características del inmueble así como la fecha en que estará disponible y se insertará en la base de datos.

En cada agencia trabajan varios agentes comerciales que se encargan de mostrar los inmuebles a los clientes interesados en adquirir una propiedad así como de poner a la venta los inmuebles de los clientes que desean venderlos. Cada agente comercial se caracteriza por su nombre y apellidos, DNI, dirección, teléfonos de contacto, fecha de contratación, antigüedad en la agencia y cantidad anual facturada según los inmuebles que haya vendido (esto permitirá asignar comisiones a los agentes y premiarlos según las cantidades facturadas). Además, cada agencia está dirigida por uno de los agentes comerciales que trabajan en ella. En cuanto a la búsqueda de inmuebles, los agentes están encargados de informar a los clientes sobre los inmuebles que se ajustan a sus preferencias y de mostrárselos en distintas visitas. Se almacenará información sobre los inmuebles que examina cada cliente y el agente que se encarga de mostrárselos (que no tiene porqué ser el agente que se le asigna cuando se registra en la agencia) así como la fecha y duración en que se realiza la visita a cada inmueble; puede ocurrir que un mismo cliente visite el mismo inmueble en varias ocasiones. Cada agente comercial solo muestra los inmuebles de la agencia a la que pertenece.
