<?php
$dbconn = pg_connect("
	host     = ec2-54-195-248-0.eu-west-1.compute.amazonaws.com
	dbname   = drqe518tlrcll
	user     = jsmszguhuwkcmt
	password = 027855475c9a4e8236f02912be96fa620534961f7f2c1b885a5f97a4c77051f3
")or die('Could not connect: ' . pg_last_error());

if($_GET["comand"] == "delete" and isset($_GET["number"]))
{
	$query = "UPDATE data SET name = '' WHERE id = '$_GET[number]'";
	$result = pg_query($query) or die(pg_last_error());
	echo "<script>alert('�������');</script>";
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
		echo "<script>alert('���� ������ �������');</script>";
	}
	catch (Exception $e) 
	{
		echo "<script>alert('������ �������� ���� ������');</script>";
	}
	for($i = 1; $i <= 30; $i++)
	{
		switch($i)
		{
			case 1:{ $text = "����������� ������ ����� �������� ����� ����������."; } break;
			case 2:{ $text = "����������� ������ ��������� ����� ��������� ���."; } break;
			case 3:{ $text = "����������� ������ ����� �������� �������������� ���������."; } break;
			case 4:{ $text = "����������� ������ ����� ������� ������ ������ ������."; } break;			
			case 5:{ $text = "����������� ������ ���������� �������� ����."; } break;
			case 6:{ $text = "����������� ������  ������� �����������."; } break;
			case 7:{ $text = "����������� ������ ������ ��������."; } break;
			case 8:{ $text = "����������� ������  ���������� ������������."; } break;
			case 9:{ $text = "���������� ���������� ��������������: ������������� ������� ���������."; } break;
			case 10:{ $text = "���������� ���������� ��� ���������� ���������� ��������."; } break;
			case 11:{ $text = "���������� ���������� ����������� �������."; } break;
			case 12:{ $text = "���������� ���������� ��� ������������� ���������� ����������������� � ������������."; } break;
			case 13:{ $text = "���������� ���������� ��� ������������� ���������� ��������������� � ���������."; } break;
			case 14:{ $text = "�������������� ������� ��������� ����� �����������."; } break;
			case 15:{ $text = "���������� ���������� �������� ������� ����������� �������."; } break;
			case 16:{ $text = "���������� ���������� ������������ ���������� ��� ����� �� ������."; } break;
			case 17:{ $text = "���������� ���������� ��������������� ������� ��������������� ������."; } break;
			case 18:{ $text = "���������� ���������� ������������������� ������� ����� ��������-������������."; } break;
			case 19:{ $text = "������������������ ������� ����� ������� � ���������� ������� ������������ �������."; } break;
			case 20:{ $text = "������������������ �������������� ���������� ������� �� �������."; } break;
			case 21:{ $text = "������ ������� ������."; } break;
			case 22:{ $text = "������������������ �������������� ������� ���������� �����."; } break;
			case 23:{ $text = "����������� ������ ����� ������������ ���������."; } break;
			case 24:{ $text = "����������� ������ ������� ���� ���������."; } break;
			case 25:{ $text = "����������� ����������� ������ �����������."; } break;
			case 26:{ $text = "����������� ������ ���������� ��������� ������������."; } break;
			case 27:{ $text = "����������� ������ ����������."; } break;
			case 28:{ $text = "����������� ������ �������� �������."; } break;
			case 29:{ $text = "����������� ������ ��������������-���������� ��������� ��� �������� ������� ��������."; } break;
			case 30:{ $text = "����������� ������ ���������� ��� ����� ���������� � ����������."; } break;
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
		echo "<script>alert('�������������');</script>";
	}	
	else
	{
		echo "<script>alert('������');</script>";
	}
	$result = pg_query($query) or die(pg_last_error());
}
pg_free_result($result);
pg_close($dbconn);
?>
<html>
	<head>
		<title>������� �� �������� ������</title>
		<link rel="SHORTCUT ICON" href="icon.ico" type="image/x-icon">
		<style type="text/css">
			TABLE {width: 100%; /* ������ ������� */ /* ����� ������ ������� */}
			TD, TH {padding: 5px;  /* ���� ������ ����������� ����� */}
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
				color: #fff; /* ���� ������ */
				cursor: pointer;
			    text-decoration: none; /* ������� ������������� � ������ */
				user-select: none; /* ������� ��������� ������ */
				background: rgb(212,75,56); /* ��� ������ */
				padding: .7em 1.5em; /* ������ �� ������ */
				outline: none; /* ������� ������ � Mozilla */
			} 
			input[type = "submit"]:hover { background: rgb(232,95,76); } /* ��� ��������� ������� ����� */
			input[type = "submit"]:active { background: rgb(152,15,0); } /* ��� ������� */
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
			<th>�����</th><th>�������� ����</th><th>�������</th>
			<?php
				try
				{
					$query = "SELECT * FROM data";
					$result = pg_query($query) or die(pg_last_error());
					while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
					{
						echo '<tr style = ""><td>' . $line["id"] . '</td><td>' . $line["text"] . '</td><td>' . $line["name"] . '</td></tr>';
					}
				}
				catch (Exception $e) { }
			?>	
		</table>
		
		<form method="post" style = "text-align: left;">
			<input type = "text" name = "text_number" placeholder = "����� ����" style = "width: 25%;" /><input type = "text" name = "text_name"  placeholder = "�������" style = "width: 45%;" /><input type = "submit" value = "�������������" name = "button" style = "width: 30%;" />
		</form>
		</div>
	</body>
</html>



















