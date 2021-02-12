
<table>
<tr>
    <td>
        <label>Clear Results</label>
    </td>
    <td>
        <input type='checkbox' onclick='myFunction1()' checked>Prog memory</button>
        <input type='checkbox' onclick='myFunction2()' checked>Memory Type</button>
        <input type='checkbox' onclick='myFunction3()' checked>Eeprom</button><br>
        <input type='checkbox' onclick='myFunction4()' checked>RAM</button>
        <input type='checkbox' onclick='myFunction5()' checked>I/O Pins</button>
        <input type='checkbox' onclick='myFunction6()' checked>Pckages</button>
    </td>
    <td>
        <input type='checkbox' onclick='myFunction7()' checked>ADC</button>
        <input type='checkbox' onclick='myFunction8()' checked>Comp</button>
        <input type='checkbox' onclick='myFunction9()' checked>Timers</button>
        <input type='checkbox' onclick='myFunction10()' checked>Serial Comm</button><br>
        <input type='checkbox' onclick='myFunction11()' checked>Max Speed</button>
        <input type='checkbox' onclick='myFunction12()' checked>IntOSC</button>
    </td>
</tr>
</table>

<?php

echo "<style>
th, td {border: 1px solid black;}
tr:hover {background-color:#f5f5f5;}
</style>";

$i = 2;
$servername = "localhost";
$username = "id15184126_tlaloc";
$password = "Prueba12345!";
$dbname = "id15184126_portfolio";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$busqueda = $_POST["fname"];
$sql = "SELECT * FROM micros, analog, digital, speeds, memorytype, presentation where product like '%$busqueda%' and micros.micro_id=analog.adc_id and micros.micro_id=digital.dig_id and micros.micro_id=speeds.speed_id and micros.packages=presentation.box_id and micros.memorytype=memorytype.type_id order by micro_id";
$result = mysqli_query($conn, $sql);

echo "<table><tr><th>Product</th><th id='memory1'>Memory</th><th id='type1'>Memory_type</th><th id='eeprom1'>EEprom</th><th id='ram1'>RAM</th><th id='pins1'>I/O_pins</th><th style='padding-right:160px;' id='box1'>Packages</th><th id='adc1'>A/D_Converter</th><th id='comp1'>Comp</th><th style='padding-right:100px;' id='timers1'>Timers</th><th style='padding-right:150px;' id='serial1'>Serial_Comm</th><th id='max1'>Max_Speed</th><th style='padding-right:100px;' id='intosc1'>IntOSC</th></tr>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["product"]. "</td><td id='memory$i'>" . $row["progmemory"]. "</td><td id='type$i'>" . $row["memtype"]. "</td><td id='eeprom$i'>" . $row["eeprom"]. "</td><td id='ram$i'>" . $row["ram"]. "</td><td id='pins$i'>" . $row["pins"]. "</td><td id='box$i'>" . $row["box"]. "</td><td id='adc$i'>" . $row["ADC"] . " x " . $row["res"]. "bit </td><td id='comp$i'>" . $row["comp"]. "</td><td id='timers$i'>" . $row["timer16"]. "-16bit, " . $row["timer8"]. "-8bit </td><td id='serial$i'>" . $row["serial"]. "</td><td id='max$i'>" . $row["max"]. " MHz </td><td id='intosc$i'>" . $row["intOSC"]. " MHz </td></tr>";
$i++;
    }
echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
$GLOBALS['z']=$GLOBALS['i'];

?> 



<script>
function myFunction1() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('memory$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}

function myFunction2() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('type$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction3() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('eeprom$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction4() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('ram$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction5() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('pins$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction6() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('box$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction7() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('adc$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction8() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('comp$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction9() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('timers$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction10() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('serial$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction11() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('max$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>

<script>
function myFunction12() {
<?php
for ($j = 1; $j <= $z; $j++) {
echo "var x = document.getElementById('intosc$j');
  if (x.style.display === 'none') {
    x.style.display = 'table-cell';
  } else {
    x.style.display = 'none';
  }";
}
?>
}
</script>



