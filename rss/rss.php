<?php
    require('../conexion/conexion.php');
    $consulta_cursos = "SELECT c.id as id, c.nombre as nombre, c.descripcion as descripcion, c.horas as horas, d.nombre as dificultad from cursos c join dificultades d on d.id=c.dificultad_id";
    $query_cursos = $conexion -> query($consulta_cursos);

    $consulta_master = "SELECT * from clases_maestras";
    $query_master = $conexion -> query($consulta_master);

    $xml = new XMLWriter();
    $xml->openUri('cursosOnline.xml');
    $xml->startDocument('1.0', 'UTF-8');
    $xml->startElement('RSS');
        $xml -> writeAttribute('title', "Net Runners");
        $xml -> writeAttribute('Descripcion', "Pagina de cursos online");
        $xml -> writeAttribute('link', "cursosonline.local");
        $xml -> writeAttribute('lastBuildDate',"20/5/2025");
        $xml -> writeAttribute('pubDate',"20/5/2025");

        $xml->startElement('Cursos');
            $xml -> writeAttribute('title', "Cursos");
            $xml -> writeAttribute('Descripcion', "Pagina de todos los cursos");
            $xml -> writeAttribute('link', "cursosonline.local/cursos/cursos.php");

            while($fila = $query_cursos -> fetch_assoc()){
                $xml->startElement('Curso');
                    $xml -> writeAttribute('Nombre', $fila['nombre']);
                    $xml -> writeAttribute('Descripcion', $fila['descripcion']);
                    $xml -> writeAttribute('Horas', $fila['horas']);
                    $xml -> writeAttribute('Dificultad', $fila['dificultad']);
                    $xml -> writeAttribute('link', "cursosonline.local/cursos/pag_curso.php?id=".$fila['id']);
        
                    $xml -> startElement('Lecciones');
                        $consulta_leccion = "SELECT * from lecciones where curso_id=".$fila['id']." order by num_leccion asc";
                        $query_leccion = $conexion -> query($consulta_leccion);
                        while($row = $query_leccion -> fetch_assoc()){
                            $xml -> startElement("Leccion");
                                $xml -> writeAttribute('Numero de leccion', $row['num_leccion']);
                                $xml -> writeAttribute('Nombre',$row['nombre']);
                                $xml -> writeAttribute('Descripcion', $row['descripcion']);
                                $xml -> writeAttribute('Minutos', $row['tiempo']);
                                $xml -> writeAttribute('link', "cursosonline.local/cursos/lecciones/pag.leccion.php?id=".$row['id']."&curso_id=".$fila['id']);
                            $xml -> endElement();
                        }
                    $xml -> endElement();
                $xml -> endElement();
            }
        $xml -> endElement();
        
        $xml -> startElement('MasterClasses');
            $xml -> writeAttribute('title', "MasterClasses");
            $xml -> writeAttribute('Descripcion', "Pagina de todas las MasterClass");
            $xml -> writeAttribute('link',"cursosonline.local/masterclass/masterclass.php");
            while($fila = $query_master -> fetch_assoc()){
                $xml -> startElement('MasterClass');
                $xml -> writeAttribute('Nombre', $fila['nombre']);
                $xml -> writeAttribute('Descripcion', $fila['descripcion']);
                $xml -> writeAttribute('link', "cursosonline.local/masterclass/pag_master.php?id=".$fila['id']);
                $xml -> endElement();
            }
        $xml -> endElement();
    $xml -> endElement();
    $xml -> endDocument();

    header('Content-Description: File Transfer');
    header('Content-Type: application/xml');
    header('Content-Disposition: attachment; filename="'.basename("cursosOnline.xml").'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("cursosOnline.xml"));
    readfile("cursosOnline.xml");
?>