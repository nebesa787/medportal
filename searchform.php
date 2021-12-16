<?php
	global $all;
	//$all = file_get_contents('http://tabletka.by/api.2.0/tab.api.php?tablist.download={}');
	//$all = json_decode($all);
	
?>
<div class="s_in_wr">
	<form method="get" id="searchform_apt" class="hide_class apt_search" action="<?php echo home_url( '/result/' ) ?>" >
		<?php 
			if($_GET['ls']){
				$s_q=$_GET['ls'];
			}else{
				$s_q=$_GET['s'];
			}
		?>
		<input type="text" value="<?php echo $s_q; ?>" name="s" id="s_s" class="s_in" placeholder="Поиск по" />
		<div class="select1">
			<select name="typer" id="typer"><option value="apt">аптекам</option><option value="portal">порталу</option></select>
		</div>
		<div class="select2">
			<?php/*
			<select name="regnum" id="regnum">
			<?php foreach($all->response[1]->reglist as $key=>$val){ ?><option value="<?php echo $val->reg_num;?>"<?php if($val->reg_num == 23){echo ' selected="selected" ';}?>><?php echo $val->region;?></option><?php } ?>
			</select>
			*/?>
			<select name="regnum" id="regnum" >
				
			<option value="42">Барановичи</option><option value="92">Барань</option><option value="121">Белоозерск</option><option value="145">Белыничи</option><option value="91">Береза</option><option value="161">Березино</option><option value="43">Березовка</option><option value="153">Берестовица</option><option value="90">Бешенковичи</option><option value="56">Бобруйск</option><option value="48">Борисов</option><option value="95">Боровляны</option><option value="94">Браслав</option><option value="41">Брест</option><option value="168">Буда-Кошелево</option><option value="151">Быхов</option><option value="93">Верхнедвинск</option><option value="155">Ветка</option><option value="89">Вилейка</option><option value="19">Витебск</option><option value="37">Волковыск</option><option value="162">Воложин</option><option value="167">Вороново</option><option value="122">Высокое</option><option value="123">Ганцевичи</option><option value="185">Гатово</option><option value="141">Глубокое</option><option value="179">Глуск</option><option value="36">Гомель</option><option value="59">Горки</option><option value="198">Городок</option><option value="38">Гродно</option><option value="71">Давид-Городок</option><option value="102">Дзержинск</option><option value="86">Добруш</option><option value="154">Дрибин</option><option value="124">Дрогичин</option><option value="96">Дружный пос.</option><option value="200">Дубровно</option><option value="142">Дятлово</option><option value="50">Жабинка</option><option value="68">Житковичи</option><option value="24">Жлобин</option><option value="62">Жодино</option><option value="143">Заславль</option><option value="166">Зельва</option><option value="125">Иваново</option><option value="126">Ивацевичи</option><option value="77">Ивье</option><option value="103">Калинковичи</option><option value="74">Каменец</option><option value="152">Кировск</option><option value="76">Клецк</option><option value="187">Климовичи</option><option value="197">Кличев</option><option value="127">Кобрин</option><option value="158">Колодищи</option><option value="163">Копыль</option><option value="160">Кореличи</option><option value="132">Коссово</option><option value="180">Костюковичи</option><option value="196">Краснополье</option><option value="144">Кричев</option><option value="157">Круглое</option><option value="164">Крупки</option><option value="69">Лельчицы</option><option value="34">Лида</option><option value="10">Логойск</option><option value="128">Лунинец</option><option value="165">Любань</option><option value="129">Ляховичи</option><option value="130">Малорита</option><option value="87">Марьина Горка</option><option value="195">Мачулищи</option><option value="70">Микашевичи</option><option value="23" selected="selected">Минск</option><option value="58">Минск-Заводской</option><option value="49">Минск-Ленинский</option><option value="54">Минск-Московский</option><option value="60">Минск-Октябрьский</option><option value="45">Минск-Партизанский</option><option value="44">Минск-Первомайский</option><option value="7">Минск-Советский</option><option value="2">Минск-Фрунзенский</option><option value="61">Минск-Центральный</option><option value="99">Миоры</option><option value="156">Мир</option><option value="184">Михановичи</option><option value="40">Могилев</option><option value="39">Мозырь</option><option value="46">Молодечно</option><option value="149">Мосты</option><option value="147">Мстиславль</option><option value="175">Мядель</option><option value="176">Нарочь</option><option value="85">Негорелое</option><option value="75">Несвиж</option><option value="81">Новогрудок</option><option value="100">Новополоцк</option><option value="51">Орша</option><option value="80">Осиповичи</option><option value="169">Островец</option><option value="150">Ошмяны</option><option value="52">Пинск</option><option value="171">Плещеницы</option><option value="72">Полоцк</option><option value="193">Поставы</option><option value="65">Пружаны</option><option value="88">Речица</option><option value="191">Рогачев</option><option value="172">Руденск</option><option value="140">Ружаны</option><option value="186">Самохваловичи</option><option value="79">Светлогорск</option><option value="78">Свислочь</option><option value="148">Скидель</option><option value="146">Славгород</option><option value="57">Слоним</option><option value="98">Слуцк</option><option value="173">Смиловичи</option><option value="170">Смолевичи</option><option value="55">Сморгонь</option><option value="35">Солигорск</option><option value="174">Старые Дороги</option><option value="64">Столбцы</option><option value="131">Столин</option><option value="139">Телеханы</option><option value="199">Толочин</option><option value="178">Узда</option><option value="47">Фаниполь</option><option value="97">Хойники</option><option value="188">Хотимск</option><option value="181">Чаусы</option><option value="177">Червень</option><option value="194">Чериков</option><option value="73">Шарковщина</option><option value="53">Шклов</option><option value="202">Шумилино</option><option value="67">Щучин</option><option value="1000">Все Регионы</option>			
			</select>
		</div>
		<input type="hidden" value="<?php echo $s_q; ?>" name="ls" id="s_ls"/>
		<input class="s_btn" type="submit" value="">
	</form>
</div>
