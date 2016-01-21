<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Progress Bar block English language translation
 *
 * @package    contrib
 * @subpackage block_progress
 * @copyright  2010 Michael de Raadt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Module names.
$string['aspirelist'] = 'Aspire resource list';
$string['assign'] = 'Assignment';
$string['assignment'] = 'Assignment';
$string['book'] = 'Libro';
$string['bigbluebuttonbn'] = 'Big Blue Button';
$string['certificate'] = 'Certificado';
$string['chat'] = 'Chat';
$string['choice'] = 'Choice';
$string['data'] = 'Base de datos';
$string['equella'] = 'Equella';
$string['feedback'] = 'Feedback';
$string['flashcardtrainer'] = 'Flashcard trainer';
$string['folder'] = 'Carpeta';
$string['forum'] = 'Foro';
$string['glossary'] = 'Diccionario';
$string['hotpot'] = 'Hot Potatoes';
$string['hsuforum'] = 'Foro Avanzado';
$string['imscp'] = 'IMS Content Package';
$string['journal'] = 'Diario';
$string['lesson'] = 'Lección';
$string['lti'] = 'Herramienta externa';
$string['ouwiki'] = 'OU Wiki';
$string['page'] = 'Página';
$string['panopto'] = 'Panopto video';
$string['questionnaire'] = 'Questionario';
$string['quiz'] = 'Quiz';
$string['resource'] = 'Archivo';
$string['recordingsbn'] = 'BBB Recordings';
$string['scorm'] = 'SCORM';
$string['turnitintool'] = 'Herramienta Turnitin';
$string['turnitintooltwo'] = 'Herramienta Turnitin 2';
$string['url'] = 'URL';
$string['video'] = 'Video';
$string['vpl'] = 'Laboratorio Virtual de Programación';
$string['wiki'] = 'Wiki';
$string['workshop'] = 'Taller';

// Actions.
$string['activity_completion'] = 'completición de actividad';
$string['answered'] = 'respondido';
$string['assessed'] = 'assessed';
$string['attempted'] = 'intentado';
$string['awarded'] = 'awarded';
$string['completed'] = 'completado';
$string['finished'] = 'terminado';
$string['graded'] = 'con nota';
$string['marked'] = 'corregido';
$string['passed'] = 'pasado';
$string['passedby'] = 'pasado de la fecha limite';
$string['passedscorm'] = 'pasado';
$string['posted_to'] = 'posted to';
$string['responded_to'] = 'respondido a';
$string['submitted'] = 'entregado';
$string['viewed'] = 'visto';

// Stings for the Config page.
$string['config_default_title'] = 'Barra de Progreso';
$string['config_group'] = 'Visible solo al grupo';
$string['config_header_action'] = 'Acción';
$string['config_header_expected'] = 'Esperado para';
$string['config_header_icon'] = 'Icono';
$string['config_header_locked'] = 'Bloqueado a fecha límite';
$string['config_header_monitored'] = 'Monitoreado';
$string['config_icons'] = 'Usar iconos en la barra';
$string['config_now'] = 'Use AHORA';
$string['config_percentage'] = 'Mostrar porcentaje a estudiantes';
$string['config_title'] = 'Título alternativo';
$string['config_orderby'] = 'Ordenar los items de la barra por';
$string['config_orderby_due_time'] = 'Esperado por fecha límite';
$string['config_orderby_course_order'] = 'Orden en el curso';
$string['config_warning_logstores'] = 'Warning: No estás logeado asique las acciones dependientes de las vistas no serán revisadas.';
$string['config_warning_loglifetime'] = 'Warning: Los logs son borrados despues de {$a} dia(s). Acciones dependientes de las vistas se verán afectadas por esto.';

// Help strings.
$string['why_set_the_title'] = '¿Por qué querrías ponerle título al bloque?';
$string['why_set_the_title_help'] = '
<p>Podría haber muchas instancias de este bloque. Puedes usar diferentes Barras de Progreso para monitoreas diferentes grupos de actividades o recursos. Por ejemplo, podrías monitorear las tares y Quizzes por separado. Es por esto que puedes sobreescribir el título por defecto y elegir un título mas apropiado para cada bloque.</p>
';
$string['why_use_icons'] = '¿Por qué querrías usar iconos?';
$string['why_use_icons_help'] = '
<p> Podrías querer agregar iconos de tickets y cruces para hacer la Barra de Progresso más accesible para alumnos con problemas de daltonismo.</p>
<p> Podría también hacer el bloque más claro, si es que crees que los colores no son lo suficientemente intuitivos, tanto por la cultura o por razones personales.</p>
';
$string['why_display_now'] = '¿Por qué querrías esconde/mostrar el indicador AHORA?';
$string['why_display_now_help'] = '
<p>No todos los cursos se centran en la completicion de taeras en una fecha específica. Algunos cursos pueden tener una inscripción abierta, permitiendole a los alumnos inscribirse y completar cuando puedan.</p>
<p>Para usar la Barra de Progreso como herramiento en ese tipo de cursos, crear "Esperado por fecha límite" en el futuro lejano y configura el "Use AHORA" en No.</p>
';
$string['what_does_monitored_mean'] = '¿Qué significa monitoreado?';
$string['what_does_monitored_mean_help'] = '
<p>La idea de este bloque es motivar a los estudiantes a usar su tiempo con eficiencia. Cada estudiante puede monitorear su progreso e las actividades y/o recursos que tú creaste.</p>
<p>En la página de configuración vas a ver una lista de todos los módulos que has creadoque pueden ser monitoreados por el bloque Barra de Progreso. Los módulos solo seran monitoreados y apareceran en pequeños cuadrados en la barra de progreso si elijes Si en monitorear el módulo.</p>
';
$string['what_locked_means'] = '¿Qué significa bloqueado a fecha límite?';
$string['what_locked_means_help'] = '
<p>Cuando una actividad, en su propia configuración, tiene fecha límite, es opcional usar la fecha límite de la actividad, o configurar otra para usar en sobre esa actividad en el bloque Barra de Progreso.</p>
<p>Para bloquear la Barra de Progreso a la fecha límite de una(s) actividad(es) en la Barra de progreso, esta tiene que que estar habilitada y configurada. Si la fecha límite esta bloqueada, cambiarla en la(s) actividad(es)se cambiara automáticamente en la Barra de Progresso.</p>
<p>Cuando una actividad no esta bloqueada a fecha límite, cambiar la fecha en la Barra de Progreso no afectará la fecha límite de  la actividad.</p>
';
$string['what_expected_by_means'] = '¿Qué significa esperado para?';
$string['what_expected_by_means_help'] = '
<p><em>Eesperado para</em> es cuando se espera quela actividad/recurso relacionada sea completada (vista, entregada, etc...).</p>
<p>Si ya hay una fecha límite asociada a la actividad, como la fecha de una tarea, esta puede ser usada como esperada para el evento mientras "bloqueado para fecha límite" esté seleccionado. Cuando se deselecciona, una nueva fecha límite puede ser configurada, y alterar esto no tiene efecto sobre la fecha límite propia de la actividad.</p>
<p>Cuando visitas la página de configuración por primera vez, o si creas una nueva actividad/recurso y regresas a la configuración, una se hará una aproximación sobre la fecha límite esperada para la actividad/recurso.
<ul>
    <li>Para una actividad con fecha límite existente, se usará esa fecha.</li>
    <li>Cuado no hay fecha límite, pero el formto del curso es semanal, se asume el final de la semana(just0 antes de la media noche del domingo).</li>
    <li>Para una actividad/recurso no usada en formato semanal, se usará la presente semana(justo antes de la media noche del siguiente domingo) .</li>
</ul>
</p>
<p>Una vez que una fecha límite esperada es configurada, es independiente de cualquer fecha límite o información de la actividad/recurso.</p>
';
$string['what_actions_can_be_monitored'] = '¿Qué acciones pueden ser monitoreadas?';
$string['what_actions_can_be_monitored_help'] = '
<p>Diferentes actividades y recursos pueden ser monitoreados.</p>
<p>Como las diferentes actividades y recursos tienen usos diferentes, lo que se monitorea para cada módulo cambia. Por ejemplo, para tareas, se pueden monitorear las entrefas; en losquizzes se pueden monitorear los intentos; los foros pueden monitorearse dependiendo si el alumno escribió; ver algún recurso es monitoreado.</p>
<h3>Passing</h3>
<p>Para los módulos; tarea, quiz y lección, la opción de pasar esta relacionada con "Nota para pasar" siendo configurada para el eleento de calificación en el Libro de Calificaciones. <a href="http://docs.moodle.org/en/Grade_items#Activity-based_grade_items" target="_blank">More help...</a></p>
';
$string['why_show_precentage'] = '¿Por qué mostrarle el porcentaje de progreso a los alumnos?';
$string['why_show_precentage_help'] = '
<p>Es posible mostrarles el porcentaje de avance sobre el total de actividades/recursos a los alumnos.</p>
<p>Se calcula como la cantidad de elementos completados dividido en la cantidad de elementos totales en la barra.</p>
<p>El porcentje de progreso aparece cuando pasa el mouse sobre un elemento de la barra.</p>
';
$string['how_ordering_works'] = 'Como funciona el ordenador';
$string['how_ordering_works_help'] = '
<p> Hay dos maneras en que los elementos de la Barra de Progreso pueden ser ordenados.</p>
<ul>
    <li><em>Esperado para fecha límite</em> (default)<br />
    Las fechas límites o configurar fechas de actividades/recursos manualmente, son usadas como orden en la Barra de Progreso.
    </li>
    <li><em>Orden en el curso</em><br />
    Las actividades/recursos se muestran en el mismo orden en que aparecen en la página del curso. Cuando se usa est opción, los aspectos relacionados con el tiempo se dehabilitan.
    </li>
</ul>
';
$string['how_group_works'] = 'Como funcionan los grupos visible';
$string['how_group_works_help'] = '
<p>Seleccionar un grupo limitará lo que se vea en el bloque a ese grupo en específico.</p>
';


// Other terms.
$string['addallcurrentitems'] = 'Agregar todas las actividades/recursos';
$string['mouse_over_prompt'] = 'Mouse sobre el bloque para información.';
$string['no_events_config_message'] = 'No hay actividades o recursos para monitorer el progreso. Crea algunas actividades y/o recursos luego configura el bloque.';
$string['no_events_message'] = 'No hay actividades o recursos siendo monitoreados. Use configuración para setiar el monitoreo.';
$string['no_visible_events_message'] = 'Ninguno de los eventos monitoreados estanán visibles.';
$string['now_indicator'] = 'AHORA';
$string['pluginname'] = 'Barra de Progreso';
$string['selectitemstobeadded'] = ' Seleccione actividades/recursos';
$string['time_expected'] = 'Esperado';

// Global setting strings
// Default colours that may have different cultural meanings.
// Note that these defaults can be overridden by the block's global settings.
$string['attempted_colour'] = '#73A839';
$string['notAttempted_colour'] = '#C71C22';
$string['futureNotAttempted_colour'] = '#025187';
$string['attempted_colour_title'] = 'Color con intento';
$string['attempted_colour_descr'] = 'Código de color HTML para elementos que donde se ha hecho un intento';
$string['notattempted_colour_title'] = 'Color sin intento';
$string['notattempted_colour_descr'] = 'Código de color HTML para elementos en donde no se ha hecho un intentod';
$string['futurenotattempted_colour_title'] = 'Color eventos futuros';
$string['futurenotattempted_colour_descr'] = 'Código de color HTML para elementos futuros que todavia no tienen intentos';
$string['coursenametoshow'] = 'Nombre del curso para mostrar en Dashboard';
$string['shortname'] = 'Nombre corto del curso';
$string['fullname'] = 'Nombre completo del curso';
$string['showinactive'] = 'Mostrar a los alumnos inactivos en vista general';

// Overview page strings.
$string['lastonline'] = 'Último en el curso';
$string['overview'] = 'Vista general de estudiantes';
$string['progress'] = 'Progreso';
$string['progressbar'] = 'Barra de Progreso';

// For capabilities.
$string['progress:overview'] = 'Vista de la vision general del progreso de todos los alumnos';
$string['progress:addinstance'] = 'Agregar un nuevo bloque de Barra de ProgresoAdd a new Progress Bar block';
$string['progress:myaddinstance'] = 'Agregar un bloque de Barra de Progreso en mi página principal';

// For Cache.
$string['cachedef_cachedlogs'] = 'Consulta de registro de alacenamiento de la Barra de Progreso en caché';

// For My home page.
$string['no_blocks'] = "No hay Barra de Progreso configurada para tus cursos.";

// Date
$string['adddate'] = 'Subir fechas';
$string['testform'] = 'Subir fecha de evaluaciones';
$string['onlycsv'] = 'Solo archivos CSV';
$string['uploadsucces'] = 'Carga exitosa';
$string['back'] = 'Volver';
$string['uploaderror'] = ' Error al subir el archivo: este contiene ruts invalidos';
$string['exceldownload'] = 'Descargar Excel';