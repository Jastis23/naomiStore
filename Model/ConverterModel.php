<?php

/*
 
  class provides support for program selection.
  Calculations are made the index Pine
 */
Class ConverterModel {
    
    //define body-type and shows suitable goods
    public static function Calculate($height, $circle, $weight) {
        $dbcon = ViewGetTools::connect();
        $type = $height - ($circle + $weight);

        if ($type > 30) {
            $res = $dbcon->query("SELECT * FROM products WHERE somatotip='ekto' LIMIT 4");
            $result = $res->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }

        if (($type >= 10) && ($type <= 30)) {
            $res = $dbcon->query("SELECT * FROM products WHERE somatotip='mezo' LIMIT 4");
            $result = $res->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }
        if ($type < 10) {
            $res = $dbcon->query("SELECT * FROM products WHERE somatotip='endo' LIMIT 4");
            $result = $res->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    // conducting recruitment program training

    public static function GetProgram($height, $circle, $weight) {
        $type = $height - ($circle + $weight);
        if ($type > 30) {
            $result = "
			<h2>Эктоморф</h2>
			<p>Эктоморфам или астеникам присуще худощавое телосложение с длинными, тонкими руками и ногами, с узкой 
			грудной клеткой и плечами. Нервная система с повышенной активностью. Благодаря врожденному быстрому метаболизму,
			 уровень подкожного жира очень низок, а это снижает предрасположенность к занятиям бодибилдингом. Каждый килограмм 
			 мускулатуры набирается эктоморфами с большущим трудом, а добытые титаническими усилиями результаты быстро исчезают
			  при прекращении тренировок даже на короткий срок. Эктоморфам рекомендовано проводить короткие (не более 45 минут)
			   высокоинтенсивные тренировки с минимальным количеством кардионагрузок. В вопросах питания, типичным эктоморфам 
			   необходимо употреблять большое количество пищи с повышенной калорийностью и делать это часто (5-6 раз в день). 
			   Высокоуглеводная пища должна составлять минимум 50% дневного рациона. Белок нужно употреблять в таком количестве, 
			   чтобы на 1 кг собственного веса приходилось 1-2гр. Жидкости необходимо потреблять около 2.5л в сутки. Чтобы обуздать
			    высокий метаболизм эктаморфам рекомендуют тратить на сон не менее 8 часов в сутки.</p>
			    <h4>№1. Понедельник – ноги, нижняя часть спины.</h4>
			    <ul class='program_list'>
			    	<li>приседания со штангой, 3 сета, 8-12 повторений;</li>
			    	<li>жим ногами – 3 сета, 8-12 повторений;</li>
			    	<li>выпады с гантелями – 2 сета, 8-12 повторений;</li>
			    	<li>поочередный подъем на носок с подставки с гирей в руке — 2 сета, 8-12 повторений;</li>
			    	<li>разгибания спины (классическая гиперэкстензия на тренажере) — 2 сета, 8-12 повторений.</li>
			    </ul>

			    <h4>№2. Четверг – плечи, пресс.</h4>
			    <ul class='program_list'>
			    	<li>жим гантелей сидя, 3 сета, 8-12 повторений;</li>
			    	<li>разведение гантелей в стороны стоя, 2 сета, 8-12 повторений;</li>
			    	<li>махи гантелями сидя в наклоне, 2 сета, 8-12 повторений;</li>
			    	<li>скручивания лежа с весом, 3 сета, 12-15 повторений;</li>
			    	<li>подъемы ног (скручивание корпуса) на скамье с уклоном вниз, 3 сета, 12-15 повторений;</li>
			    	<li>перекрестные кранчи с весом из положения сидя, 3 сета, 12-15 повторений.</li>
			    </ul>

			    <h4>№3. Суббота – грудные, верхняя часть спины.</h4>
			    <ul class='program_list'>
			    	<li>жим штанги лежа на горизонтальной скамье — 3 сета, 8-12 повторений;</li>
			    	<li>отжимания на брусьях — 2 сета, 6-8 повторений;</li>
			    	<li>сведение рук в кроссовере — 2 сета, 8-12 повторений;</li>
			    	<li>подтягивания обратным хватом — 2 сета, 8-12 повторений;</li>
			    	<li>тяга гантели одной рукой — 3 сета, 8-12 повторений;</li>
			    	<li>тяга нижнего блока — 2 сета, 8-12 повторений;</li>
			    	<li>шраги со штангой за спиной — 3 сета, 8-12 повторений.</li>
			    </ul>
			    ";
            return $result;
        }

        if (($type >= 10) && ($type <= 30)) {
            $result = "
			<h2>Мезоморф</h2>
			<p>Этот соматический тип природа наделила широкой грудной клеткой и такими же широкими плечами, объемными мышцами и 
			практически полным отсутствием жира. Несмотря на быстрый метаболизм, мезоморфы (их еще называют нормостениками) без
			 каких-либо физических нагрузок и при неправильном, чрезмерно калорийном, питании легко набирают лишние килограммы 
			 подкожного жира. Под правильным питанием подразумевается ограничение жиров до 10-20% от дневного рациона и акцентирование
			  внимания на углеводах – 40-50%. Белок следует употреблять по классической схеме – 2-3гр на килограмм собственного веса.
			   Врожденная предрасположенность к атлетическому телосложению позволяет мезоморфам добиться значительных успехов в бодибилдинге, 
			   главное – тренироваться с полной самоотдачей не менее 2-3 раз в неделю. Людям с подобным телосложением подходят тренировки 
			   по принципу Джо Вейдера и аэробные занятия.</p>

			    <h4>№1. Понедельник – спина, плечи.</h4>
			    <ul class='program_list'>
			    	<li>Подтягивания на перекладине с отягощением 2 подхода до отказа;</li>
			    	<li>Становая тяга 3х8;  </li>
			    	<li>Тяга штанги в наклоне 3х10-12; </li>
			    	<li>Жим штанги от груди стоя 3х8-10;</li>
			    	<li>Подъем гантелей через стороны 3х12;</li>
			    	<li>Подъем гантелей через стороны в наклоне 2х12; </li>
			    	<li>Пресс 5х25.</li>
			    </ul>

			    <h4>№2. Среда – грудь, руки.</h4>
			    <ul class='program_list'>
			    	<li>Жим штанги лежа 3х10;</li>
			    	<li>Жим гантелей лежа на наклонной скамье 3х12;   </li>
			    	<li>Разводка гантелей лежа на скамье 2х12; </li>
			    	<li>Подъем штанги на бицепс 4х10;</li>
			    	<li>Подъем гантелей на бицепс 3х12; </li>
			    	<li>Французский жим со штангой лежа на скамье 4х10;</li>
			    	<li>Разгибание рук на блоке вниз 3х12; </li>
			    	<li>Пресс 5х25.</li>
			    </ul>

			    <h4>№3. Пятница – ноги.</h4>
			    <ul class='program_list'>
			    	<li>Приседания со штангой на плечах 3х10-12; </li>
			    	<li>Жим ногами 3х8-10;</li>
			    	<li>Разгибание ног на станке 2х12-15; </li>
			    	<li>Сгибание ног на станке 3х8-10; </li>
			    	<li>Подъем сидя/стоя на носки 4х12-20;</li>
			    	<li>Пресс 5х25.</li>
			    </ul>
			   ";
            return $result;
        }
        if ($type < 10) {
            $result = "
			<h2>Эндоморф</h2>
			<p>Эндоморфный или гиперстенический тип обладает, как правило, округлыми формами, широкой костью, короткими 
			массивными конечностями, широкими бедрами и талией, а также высоким процентом жировой ткани. Этот соматотип один из
			 самых распространенных. Для придания и поддержания рельефности, эндоморфам рекомендовано придерживаться высокобелковой 
			 диеты (40-50% от дневного рациона), с полным исключением простых сахаров и мучных продуктов, с умеренным употреблением
			  углеводов (25-35%). Тренировки необходимо проводить на регулярной основе с преобладанием базовых упражнений для ускорения
			   метаболизма и кардионагрузок. Предпочтительны такие тренинги, как сплит-системы «2+1» или «3+1».</p>
			 
			    <h4>№3. Понедельник - ноги.</h4>
			    <ul class='program_list'>
			    	<li>Приседания со штангой на плечах 4 сета по 12-15 повторений.</li>
			    	<li>Жим ногами лежа на тренажере 3 сета по 12 повторений.</li>
			    	<li>Разгибаем ноги на станке 3 сета по 12-15 повторений. </li>
			    	<li>Сгибаем ноги на станке 3 сета по 10-12 повторений.</li>
			    	<li>Жим штанги стоя от груди 4 сета по 10-12 повторений.  </li>
			    	<li>Жим гантелей над головой сидя 3 сета по 12 раз.   </li>
			    	<li>2-3 упражнения на пресс.  </li>
			    	<li> Бег, скакалка или другое аэробное упражнение 10-12 минут.  </li>
			    </ul>

			    <h4>№3. Среда - грудь.</h4>
			    <ul class='program_list'>
			    	<li> Жим штанги лежа на горизонтальной скамье 4 сета по 10-12 раз.   </li>
			    	<li>Жим гантелей лежа на наклонной скамье головой вверх 3 сета по 12 раз. </li>
			    	<li>Разводка гантелей лежа на лавке 3 сета по 12 раз.     </li>
			    	<li>Французский жим штанги с EZ грифом лежа 3 по сета 10-12 раз.  </li>
			    	<li> Разгибания рук вниз на блоке 3 сета по 12 раз.   </li>
			    	<li>2-3 упражнения на пресс.  </li>
			    	<li> Бег, скакалка или другое аэробное упражнение 10-12 минут.  </li>
			    </ul>

			 	<h4>№3. Пятница - спина.</h4>
			    <ul class='program_list'>
			    	<li> Подтягивания на перекладине широким хватом к подбородку или груди 4 сета по 8-15 раз.</li>
			    	<li>Становая тяга 3 сета по 8 повторений.</li>
			    	<li>Тяга штанги к животу в наклоне 3 сета по 10-12 повторений.   </li>
			    	<li>Тяга Т-грифа к груди в наклоне 3 сета по 8-10 раз.  </li>
			    	<li>Подъем штанги на бицепс стоя 3 сета по 8-10 повторений.</li>
			    	<li>Подъем гантели на бицепс сидя 3 сета по 10-12 раз.</li>
			    	<li>2-3 упражнения на пресс.</li>
			    	<li> Бег, скакалка или другое аэробное упражнение 10-12 минут.  </li>
			    </ul>
			   ";
            return $result;
        }
    }

}

?>
