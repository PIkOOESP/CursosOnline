create database cursosOnline;

use cursosOnline;

create table alumnos(
    id int primary key auto_increment,
    nombre varchar(100),
    apellido varchar(100),
    email varchar(200),
    password varchar(50)
);

create table profesores(
    id int primary key auto_increment,
    nombre varchar(100),
    apellido varchar(100),
    email varchar(200),
    password varchar(50)
);

create table dificultades(
    id int primary key auto_increment,
    nombre varchar(30)
);

create table cursos(
    id int primary key auto_increment,
    nombre varchar(100),
    descripcion text,
    horas int,
    dificultad_id int,
    foreign key (dificultad_id) references dificultades(id)
);

create table cursos_profesores(
    id int primary key auto_increment,
    profesor_id int,
    curso_id int,
    foreign key(profesor_id) references profesores(id),
    foreign key(curso_id) references cursos(id)
);

create table inscripciones(
    id int primary key auto_increment,
    alumno_id int,
    foreign key (alumno_id) references alumnos(id),
    curso_id int, 
    foreign key(curso_id) references cursos(id),
    fecha_fin date,
    create_at date
);

create table clases_maestras(
    id int primary key auto_increment,
    nombre varchar(100),
    descripcion text
);

create table lecciones(
    id int primary key auto_increment,
    num_leccion varchar(2),
    nombre varchar(100),
    descripcion text,
    tiempo int,
    curso_id int,
    foreign key (curso_id) references cursos (id)
);

insert into dificultades (nombre) value ("Principiante");
insert into dificultades (nombre) value ("Intermedio");
insert into dificultades (nombre) value ("Experto");

insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Introducción al Desarrollo Web","Este curso te guía paso a paso en la creación de páginas web desde cero. Aprenderás HTML para estructurar contenido, CSS para diseñarlo visualmente, y JavaScript para añadir interactividad. A lo largo de proyectos prácticos, construirás sitios web modernos, comprenderás cómo funcionan los navegadores y obtendrás una base sólida para seguir avanzando hacia frameworks como React o Angular.",20,1);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Fundamentos de Python","Este curso es perfecto para quienes quieren aprender a programar sin experiencia previa. Comenzarás con conceptos básicos como variables, tipos de datos y estructuras de control, hasta llegar a trabajar con funciones, listas y diccionarios. Aprenderás mediante ejercicios prácticos y pequeños proyectos que te permitirán aplicar lo aprendido y entender cómo resolver problemas con código.",25,1);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Diseño de Interfaces con Figma","Aprende a crear interfaces de usuario funcionales, intuitivas y visualmente atractivas utilizando Figma. El curso cubre desde la creación de wireframes hasta prototipos navegables. Dominarás el uso de componentes, auto-layout, diseño responsivo y colaboración en tiempo real. Al finalizar, podrás diseñar aplicaciones y sitios web profesionales listos para ser implementados por desarrolladores.",15,2);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Machine Learning desde Cero","Este curso es una introducción práctica al mundo del aprendizaje automático. Aprenderás qué es el machine learning, sus tipos (supervisado, no supervisado), y cómo aplicar algoritmos como regresión lineal, árboles de decisión y k-means clustering. Usarás Python, pandas y scikit-learn para desarrollar modelos reales sobre datasets del mundo real. Ideal para dar tus primeros pasos en IA.",30,2);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Ciberseguridad para Todos","En este curso aprenderás a identificar amenazas digitales comunes como malware, phishing y ransomware. Te enseñaremos conceptos clave como contraseñas seguras, autenticación de dos factores y navegación privada. También se incluyen consejos para proteger tus cuentas personales, redes WiFi y dispositivos. No necesitas conocimientos previos para empezar a navegar de forma segura.",12,1);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Java para Desarrollo Backend","Aprende a crear la lógica de aplicaciones web del lado del servidor usando Java. El curso cubre conceptos como clases, objetos, bases de datos con JDBC, estructuras de datos, controladores y REST APIs. También se introduce el uso de frameworks como Spring Boot. Ideal para quienes quieren iniciarse en el desarrollo backend profesional con uno de los lenguajes más utilizados en empresas.",35,2);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Creación de Videojuegos con Unity","Descubre cómo se crean videojuegos desde cero con Unity, uno de los motores más potentes del mercado. Aprenderás a trabajar en 2D y 3D, a usar física, animaciones, scripts en C#, y a diseñar niveles interactivos. Al finalizar, habrás creado tu propio videojuego completo, aprendiendo también a exportarlo a múltiples plataformas (PC, móvil, Web).",40,2);
insert into cursos(nombre, descripcion, horas, dificultad_id) values ("Finanzas Personales Inteligentes","Descubre cómo mejorar tu relación con el dinero. Este curso te enseña a crear un presupuesto mensual, controlar tus gastos, establecer objetivos de ahorro, y entender los conceptos básicos de inversión. Aprenderás a evitar deudas innecesarias y tomar decisiones financieras inteligentes, incluso si no tienes formación previa en economía.",10,1);

insert into alumnos(nombre, apellido, email, password) values ("Jose Luis","Romero Manzano","JLRomeroM@gmail.com","12345678");

insert into profesores(nombre, apellido, email, password) values ("Albert","Einstein","AlbertEinstein@murciaeduca.es","12345678");

insert into clases_maestras(nombre, descripcion) values ("Marca Personal & Estilo: Comunica Quién Eres","Descubre cómo construir una marca personal auténtica y con impacto en la era digital. En esta masterclass, exploramos la importancia de la imagen, la actitud y el mensaje que proyectas, tanto en redes como en tu entorno profesional. Aprende a destacar sin imitar, a crear contenido con propósito y a comunicarte con seguridad. Ideal para emprendedores, creadores de contenido y profesionales que quieren dejar huella.");
insert into clases_maestras(nombre, descripcion) values ("Dominio Avanzado de Redes y Ciberseguridad","¡Conviértete en un experto en el mundo digital con nuestra masterclass 'NETRUNNERS'! Este curso intensivo está diseñado para aquellos que buscan dominar las redes, la configuración avanzada de sistemas y las estrategias de ciberseguridad. Aprenderás de profesionales en activo, explorarás herramientas de vanguardia y resolverás desafíos reales en entornos simulados. Ya seas un principiante entusiasta o un profesional que busca actualizar sus habilidades, esta masterclass te preparará para correr en la autopista digital con confianza y destreza.");
insert into clases_maestras(nombre, descripcion) values("Transformación y Oportunidades en la Era Tecnológica","Esta master class explora las tendencias clave que están moldeando el futuro digital, desde inteligencia artificial y blockchain hasta automatización y metaverso. Descubre cómo adaptarte a los cambios tecnológicos, identificar oportunidades emergentes y desarrollar habilidades clave para prosperar en un mundo en constante evolución. Ideal para profesionales, emprendedores y curiosos que buscan entender y liderar en la nueva economía digital. ¡Prepárate para el futuro hoy!");
insert into clases_maestras(nombre, descripcion) values("El Lenguaje Secreto de los Perros","Descubre cómo piensa tu perro y aprende a comunicarte con él de manera efectiva. En esta clase práctica, te enseñaremos técnicas sencillas para mejorar su comportamiento, fortalecer vuestro vínculo y crear una convivencia más feliz. Perfecto para dueños que quieren entender realmente a su compañero peludo.");

insert into lecciones(nombre, descripcion, tiempo, num_leccion, curso_id) values ("Presentacion del curso","La Lección 0 del curso 'Introducción al Desarrollo Web'* ofrece una visión general del desarrollo web, explicando conceptos básicos como Frontend, Backend y Full Stack, el funcionamiento de la web (clientes-servidores) y las herramientas esenciales (editores de código, navegadores y Git). También introduce la estructura del curso y guía en la configuración del entorno de trabajo, preparando al estudiante para las lecciones prácticas con HTML, CSS y JavaScript.",1,"0",1);
insert into lecciones(nombre, descripcion, tiempo, num_leccion, curso_id) values ("Preparándote para Aprender Desarrollo Web","Antes de escribir tu primera línea de código, es importante saber qué necesitas para comenzar en el mundo del desarrollo web. En esta lección, repasaremos las herramientas esenciales, los conocimientos básicos recomendados y la mentalidad que te ayudarán a aprovechar al máximo este curso. ¡Vamos a prepararte para el viaje!",1,"1",1);
insert into lecciones(nombre, descripcion, tiempo, num_leccion, curso_id) values ("El Esqueleto de la Web - ¿Cómo se Construyen las Páginas?","Detrás de cada sitio web hay un lenguaje secreto que los navegadores entienden: HTML. En esta lección descubriremos cómo funciona este 'esqueleto digital' que da estructura a todo lo que vemos online. Aprenderás las etiquetas básicas, la anatomía de una página web y harás tu primera incursión práctica en el código. ¡Prepárate para ver la web con otros ojos!",7,"2",1);
insert into lecciones(nombre, descripcion, tiempo, num_leccion, curso_id) values ("Anatomía de una Página Web – Un Vistazo Tras Bambalinas","¿Alguna vez te has preguntado qué hay detrás de tu sitio web favorito? En esta lección destriparemos una página real para mostrarte cómo HTML, CSS y JavaScript trabajan en equipo. Veremos:
El 'esqueleto' HTML (estructura básica)
El 'estilista' CSS (diseño y colores)
El 'cerebro' JavaScript (funcionalidad dinámica)
¡Terminarás entendiendo cómo se ensamblan estas piezas para crear la magia de la web! (Incluiremos ejemplos prácticos con código para que experimentes tú mismo)",4,"3",1);

insert into lecciones(nombre, descripcion, tiempo, num_leccion, curso_id) values ("Tu Taller Digital – Editores para Crear Páginas Web","Un buen editor de código es como el pincel de un artista para un desarrollador web. En esta lección exploraremos:
Editores populares (VS Code, Sublime Text, Atom) y sus superpoderes
Extensiones mágicas (Emmet, Live Server) que aceleran tu flujo de trabajo
Cómo configurar tu entorno ideal para proyectos web
Veremos ejemplos prácticos de cómo estos editores resaltan tu código, detectan errores y te hacen sentir como un verdadero hacker (pero de los buenos ).
Práctica: Instalaremos y personalizaremos VS Code juntos, ¡tu nueva navaja suiza digital!",4,"4",1);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Bienvenida al Mundo Python","¿Listo para dominar uno de los lenguajes más versátiles y demandados? En esta introducción:
Por qué Python (desarrollo web, IA, automatización y más)
Mentalidad de programador (cómo abordar problemas como profesional)
Setup inicial (instalación de Python 3 y configuración básica)
Metodología del curso (de cero a proyectos reales paso a paso)
'En Python, todo comienza con un simple print('¡Hola Mundo!')... pero termina creando cosas extraordinarias.'",2,"0",2);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Tu Primer Paso en Python","¡Manos a la obra! En esta lección práctica:
Descarga e instalación de Python 3 (Windows/macOS/Linux)
Cómo verificar que todo funciona correctamente
Configuración básica de tu entorno de desarrollo
Tu primer '¡Hola Mundo!' en IDLE y terminal
'Instalar Python es como conseguir tu primer martillo: ahora todo a tu alrededor parece un clavo que quieres programar'",13,"1",2);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Ejecutando tus Primeros Programas en Python","n esta lección descubrirás cómo dar vida a tu código:
Diferencia clave: Interpretado vs Compilado (y por qué Python es especial)
3 formas de ejecutar código:
REPL interactivo (pruebas rápidas)
Scripts .py (programas completos)
Entornos de desarrollo (VS Code/PyCharm)
Flujo de trabajo típico: Editar → Guardar → Ejecutar → Depurar",13,"2",2);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Domina Tus Finanzas","¿Sientes que el dinero se te escapa de las manos? En esta introducción revolucionaria:
Por qué el 90% fracasa en sus finanzas (y cómo evitarlo)
Los 3 pilares invisibles (Ahorro Inteligente, Ingresos Pasivos, Mentalidad Millonaria)
Tu diagnóstico financiero personal (con plantilla descargable)
Roadmap del curso: Desde ordenar tus cuentas hasta invertir como los grandes
'No es cuánto ganas, sino cuánto conservas... y hoy empiezas a transformar tu relación con el dinero.'
Bonus: ¿Sabías que el 78% de los millonarios se hicieron ricos invirtiendo, no heredando?",3,"0",8);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Tarjetas de crédito en 2023 – ¿Aliadas o enemigas?","Descubre cómo usar las tarjetas de crédito a tu favor sin caer en deudas:
Beneficios clave: Construir historial crediticio, obtener recompensas y seguridad en compras
Riesgos principales: Intereses altos, comisiones ocultas y el peligro del pago mínimo
Trucos para usarlas inteligentemente:
Pagar el saldo completo cada mes
Elegir tarjetas con beneficios que realmente uses
Nunca superar el 30% de tu límite de crédito
Ejemplo práctico: Compararemos cuánto cuesta realmente una TV de $10,000 pagada a meses vs. al contado.
'La tarjeta no es dinero extra, es un herramienta financiera: quien la controla gana, quien la abuse pierde'",6,"1",8);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Controla tu Endeudamiento sin Desesperarte","Aprende a manejar tus deudas como un experto en finanzas personales:
Los 3 tipos de deuda que existen (y cuáles sí valen la pena)
La regla 28/36: El porcentaje máximo de ingresos que deberías destinar a deudas
Métodos probados para organizar tus pagos:
Avalancha: Atacar primero las deudas con mayores intereses
Bola de nieve: Liquidar primero las deudas más pequeñas para ganar motivación
Herramientas gratuitas para monitorear tu progreso (hojas de cálculo y apps útiles)
Caso práctico: Reestructuraremos juntos una situación real de deuda de tarjetas y préstamos.
'Las deudas no son buenas ni malas... son un termómetro de tus decisiones financieras'
",10,"2",8);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Bienvenida al Mundo de la Ciberseguridad","¿Alguna vez te has preguntado cómo protegen tus datos en internet o cómo funcionan los ataques informáticos? En esta introducción:
Qué es la ciberseguridad (y por qué debería importarte)
Conceptos clave: hackers éticos vs. maliciosos, tipos de amenazas comunes
Roadmap del curso: desde fundamentos técnicos hasta técnicas reales de protección
Setup inicial: herramientas gratuitas que usaremos (Kali Linux, Wireshark, etc.)
'En ciberseguridad no hay sistemas 100% invulnerables... pero después de este curso sabrás cómo convertirte en un firewall humano.'
Disclaimer: Todo lo aprendido será únicamente para uso ético y legal.",7,"0",5);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Tu Laboratorio de Ciberseguridad","¡Prepárate para crear tu entorno seguro de hacking ético! En esta guía paso a paso:
Descarga oficial de Kali Linux 2025 (solo desde offensive-security.com)
2 Métodos de instalación:
VirtualBox (configuración óptima para máquinas virtuales)
VMware (para mayor rendimiento)
Configuración clave:
Asignación de recursos (RAM, CPU, disco)
Habilitar modo puente para prácticas de red
Instalar Guest Additions (mejor integración)
Demo práctica: Bootearemos Kali y probaremos herramientas básicas en terminal.
Pro-tip: 'Nunca instales Kali como SO principal... ¡a menos que quieras que tu laptop sea un imán de problemas!'",23,"1",5);

insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Proximamente"," ",0,"0",3);
insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Proximamente"," ",0,"0",4);
insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Proximamente"," ",0,"0",6);
insert into lecciones (nombre, descripcion, tiempo, num_leccion, curso_id) values ("Proximamente"," ",0,"0",7);