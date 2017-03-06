<?php
$dbconn = pg_connect("
	host     = ec2-54-217-235-11.eu-west-1.compute.amazonaws.com
	dbname   = d44a3esdip8873
	user     = wqkeskyziyyhqd
	password = ae39d71a4b0eec6e94c28f1cd533f6a42da4e6f2133e6b8c0b8abff04d3f2f8f
")or die('Could not connect: ' . pg_last_error());

if($_GET["comand"] == "delete" and isset($_GET["number"]))
{
	$query = "UPDATE data SET name = '' WHERE id = '$_GET[number]'";
	$result = pg_query($query) or die(pg_last_error());
	echo "<script>alert('Удалено');</script>";
}
if($_GET["comand"] == "create")
{
	try 
	{  
		$query = "CREATE TABLE data (
		id TEXT NOT NULL,
		name TEXT NOT NULL,
		text TEXT NOT NULL)";
		$result = pg_query($query) or die(pg_last_error());
		echo "<script>alert('База данных создана');</script>";
	}
	catch (Exception $e) 
	{
		echo "<script>alert('Ошибка создания базы данных');</script>";
	}
	for($i = 1; $i <= 30; $i++)
	{
		switch($i)
		{
			case 1:{ $text = "Программный модуль учета книжного фонда библиотеки."; } break;
			case 2:{ $text = "Программный модуль воинского учета студентов СПО."; } break;
			case 3:{ $text = "Программный модуль учета клиентов туристического агентства."; } break;
			case 4:{ $text = "Программный модуль учета заказов салона мягкой мебели."; } break;			
			case 5:{ $text = "Программный модуль управление доходами кафе."; } break;
			case 6:{ $text = "Программный модуль  «Прокат автомобилей»."; } break;
			case 7:{ $text = "Программный модуль «Книга рецептов»."; } break;
			case 8:{ $text = "Программный модуль  «Агентство недвижимости»."; } break;
			case 9:{ $text = "Разработка приложения «Анкетирование: преподаватель глазами студентов»."; } break;
			case 10:{ $text = "Разработка приложения для управления складскими запасами."; } break;
			case 11:{ $text = "Разработка приложения «Управление кадрами»."; } break;
			case 12:{ $text = "Разработка приложения для автоматизации управления взаимоотношениями с поставщиками."; } break;
			case 13:{ $text = "Разработка приложения для автоматизации управления взаимодействием с клиентами."; } break;
			case 14:{ $text = "Информационная система состояния рынка автомобилей."; } break;
			case 15:{ $text = "Разработка приложения принятия заказов медицинской техники."; } break;
			case 16:{ $text = "Разработка приложения тестирования кандидатов при приёме на работу."; } break;
			case 17:{ $text = "Разработка приложения «Информационная система Железнодорожный вокзал»."; } break;
			case 18:{ $text = "Разработка приложения «Автоматизированное рабочее место продавца-консультанта»."; } break;
			case 19:{ $text = "Автоматизированная система учёта заказов и реализации товаров «Электронный магазин»."; } break;
			case 20:{ $text = "Автоматизированная информационная справочная система по товарам."; } break;
			case 21:{ $text = "Работа «Отдела кадров»."; } break;
			case 22:{ $text = "Автоматизированная информационная система складского учета."; } break;
			case 23:{ $text = "Программный модуль «Учет успеваемости студентов»."; } break;
			case 24:{ $text = "Программный модуль «Личные дела студентов»."; } break;
			case 25:{ $text = "Разработать программный модуль «Автосервис»."; } break;
			case 26:{ $text = "Программный модуль «Картотека агентства недвижимости»."; } break;
			case 27:{ $text = "Программный модуль «Авиакасса»."; } break;
			case 28:{ $text = "Программный модуль «Книжный магазин»."; } break;
			case 29:{ $text = "Программный модуль «Информационно-справочная программа для почтовых адресов клиентов»."; } break;
			case 30:{ $text = "Программный модуль «Картотека для учета литературы в библиотеке»."; } break;
		}
		$query = "INSERT INTO messages (id, name, text) VALUES ('$i', '', '$text')";
	}
}	
if(isset($_POST["button"]))	
{
	$query = "SELECT * FROM data WHERE id = '$_POST[text_number]' and name = ''";
	$result = pg_query($query) or die(pg_last_error());
	if(pg_num_rows($result) == 0)
	{
		$query = "UPDATE data SET name = '$_POST[text_name]' WHERE id = '$_POST[text_number]'";
		$result = pg_query($query) or die(pg_last_error());
		echo "<script>alert('Забронировано');</script>";
	}	
	else
	{
		echo "<script>alert('Ошибка');</script>";
	}
	$result = pg_query($query) or die(pg_last_error());
}
pg_free_result($result);
pg_close($dbconn);
?>
<html>
	<head>
		<title>Задания на курсовую работу</title>
		<link rel="SHORTCUT ICON" href="icon.ico" type="image/x-icon">
		<style type="text/css">
			TABLE {width: 100%; /* Ширина таблицы */ /* Рамка вокруг таблицы */}
			TD, TH {padding: 5px;  /* Поля вокруг содержимого ячеек */}
			TH { height: 40px; padding: 5px; color: #2b2b2b; text-align: left; background: #d9e0e7; font-weight: normal;}
		</style>
		<style>				
			body
			{
				margin: 5px;
				text-align: center;
				     font-family: Arial, Helvetica, sans-serif;
				font-size: 14px;
				line-height: 20px;
				  font-weight: 400;
				  color: #3b3b3b;
				  -webkit-font-smoothing: antialiased;
				  font-smoothing: antialiased;
				  background: white; //#2b2b2b;
			}
			input
			{
				border: 1px solid white;
				height: 40px;
				padding: 5px;
				//margin-top: 3px;
				//margin-right: 3px;
			}
			
			input[type = "submit"]
			{
				border: 0px;
				color: #fff; /* цвет текста */
				cursor: pointer;
			    text-decoration: none; /* убирать подчёркивание у ссылок */
				user-select: none; /* убирать выделение текста */
				background: rgb(212,75,56); /* фон кнопки */
				padding: .7em 1.5em; /* отступ от текста */
				outline: none; /* убирать контур в Mozilla */
			} 
			input[type = "submit"]:hover { background: rgb(232,95,76); } /* при наведении курсора мышки */
			input[type = "submit"]:active { background: rgb(152,15,0); } /* при нажатии */
			.container
			{
				margin: 0px auto;
				width: 60%;
			}
		</style>
	</head>
	
	<body>
		<div class = "container">
		
		
		<table>
			<th>Номер</th><th>Название темы</th><th>Фамилия</th>
			<?php
				$query = "SELECT * FROM data";
				$result = pg_query($query) or die(pg_last_error());
				while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
				{
					echo '<tr style = ""><td>' . $line["id"] . '</td><td>' . $line["text"] . '</td><td>' . $line["name"] . '</td></tr>';
				}
			?>	
		</table>
		
		<form method="post" style = "text-align: left;">
			<input type = "text" name = "text_number" placeholder = "Номер темы" style = "width: 25%;" /><input type = "text" name = "text_name"  placeholder = "Фамилия" style = "width: 45%;" /><input type = "submit" value = "Забронировать" name = "button" style = "width: 30%;" />
		</form>
		</div>
	</body>
</html>
