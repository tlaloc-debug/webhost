<div class="main">
  <div class="content" id="one">
    <div id="clearpc">Clear Results:</div>
  </div> 
  <div class="content" id="two">
    <input type='checkbox' onclick='myFunction1()' checked>Prog memory</button>
    <input type='checkbox' onclick='myFunction2()' checked>Memory Type</button>
    <input type='checkbox' onclick='myFunction3()' checked>Eeprom</button><br>
    <input type='checkbox' onclick='myFunction4()' checked>RAM Module</button>
    <input type='checkbox' onclick='myFunction5()' checked>In - Out Pins</button>
    <input type='checkbox' onclick='myFunction6()' checked>Packages</button>
  </div>  
  <div class="content" id="three">
    <input type='checkbox' onclick='myFunction7()' checked>An/Dig Conv.</button>
    <input type='checkbox' onclick='myFunction8()' checked>Comparators</button>
    <input type='checkbox' onclick='myFunction9()' checked>Timers </button><br>
    <input type='checkbox' onclick='myFunction10()' checked>Serial Comm</button>
    <input type='checkbox' onclick='myFunction11()' checked>Max Frequency</button>
    <input type='checkbox' onclick='myFunction12()' checked>Internal OSC</button>
  </div>
</div>

<?php

$monitor = $_POST["screen"];

if ($monitor>400) {
echo "<style>

.main {
  width: 1700px;
  height: 100px;
  display: flex;
  background-color: white;
  position: sticky;
  top: 0px;
  z-index: +1;
}

.content {
  margin: 20px 0px;
}

#clearpc {
  padding-top: 10px;
}

#one {
  position: sticky;
  left: 20px;
}

#two {
  position: sticky;
  left: 180px;
}

#three {
  position: sticky;
  left: 620px;
}

th, td {
  border: 1px solid black;
}

tr:hover {
  background-color:#f5f5f5;
}

#item {
  position: sticky;
  left: 0px;
  background-color: white;
}

#item1 {
  position: sticky;
  left: 0px;
  background-color: white;
  z-index: +1;
}

#item1, #memory1, #type1, #eeprom1, #ram1, #pins1, #box1, #adc1, #comp1, #timers1, #serial1, #max1, #intosc1  {
  position: sticky;
  top: 100px;
  background-color: white;
}

</style>";
} else {
  echo "<style>
  
  .main {
    width: 1700px;
    height: 170px;
    display: flex;
    background-color: white;
    position: sticky;
    top: 0px;
    z-index: +1;
  }
  
  .content {
    margin: 20px 0px;
  }
  
  #one {
    display: none;
  }
  
  #two {
    position: sticky;
    left: 10px;
    width: 125px;
  }
  
  #three {
    position: sticky;
    left: 150px;
    width: 125px;
  }
  
  th, td {
    border: 1px solid black;
  }
  
  tr:hover {
    background-color:#f5f5f5;
  }
  
  #item {
    position: sticky;
    left: 0px;
    background-color: white;
  }
  
  #item1 {
    position: sticky;
    left: 0px;
    background-color: white;
    z-index: +1;
  }
  
  #item1, #memory1, #type1, #eeprom1, #ram1, #pins1, #box1, #adc1, #comp1, #timers1, #serial1, #max1, #intosc1  {
    position: sticky;
    top: 170px;
    background-color: white;
  }
 
</style>";
}

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

$busqueda = $_POST["family"];
$sql = "SELECT * FROM micros, analog, digital, speeds, memorytype, presentation where model=$busqueda and micros.micro_id=analog.adc_id and micros.micro_id=digital.dig_id and micros.micro_id=speeds.speed_id and micros.packages=presentation.box_id and micros.memorytype=memorytype.type_id order by micro_id";
$result = mysqli_query($conn, $sql);

echo "<table id='thistable'><tr><th id='item1'>Product</th><th id='memory1'>Memory</th><th id='type1'>Memory_type</th><th id='eeprom1'>EEprom</th><th id='ram1'>RAM</th><th id='pins1'>I/O_pins</th><th style='padding-right:160px;' id='box1'>Packages</th><th id='adc1'>A/D_Converter</th><th id='comp1'>Comp</th><th style='padding-right:100px;' id='timers1'>Timers</th><th style='padding-right:150px;' id='serial1'>Serial_Comm</th><th id='max1'>Max_Speed</th><th style='padding-right:100px;' id='intosc1'>IntOSC</th></tr>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td id='item'>" . $row["product"]. "</td><td id='memory$i'>" . $row["progmemory"]. "</td><td id='type$i'>" . $row["memtype"]. "</td><td id='eeprom$i'>" . $row["eeprom"]. "</td><td id='ram$i'>" . $row["ram"]. "</td><td id='pins$i'>" . $row["pins"]. "</td><td id='box$i'>" . $row["box"]. "</td><td id='adc$i'>" . $row["ADC"] . " x " . $row["res"]. "bit </td><td id='comp$i'>" . $row["comp"]. "</td><td id='timers$i'>" . $row["timer16"]. "-16bit, " . $row["timer8"]. "-8bit </td><td id='serial$i'>" . $row["serial"]. "</td><td id='max$i'>" . $row["max"]. " MHz </td><td id='intosc$i'>" . $row["intOSC"]. " MHz </td></tr>";
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



