<style>
    .alta{
        background-color:chartreuse;
        margin: 1em;
        padding: .5em;
    }
    .baixa{
        background-color: red;
        margin: 1em;
        padding: .5em;
    }

</style>

<?php 
echo "<form>";
echo "<input name='afegir'>";
echo "<select name='clase'>";
echo "<option value='alta'>Alta</option>";
echo "<option value='baixa'>Baixa</option>";
echo "</select>";
echo "<input type='submit' value='afegir'>";
echo "</form>";


$db = new mysqli("localhost", "pau", "pau", "Webtasks");

//query tie
if (!empty($_GET['afegir'])) {
    $stmt = $db->prepare("INSERT INTO taulaweb VALUES(?,?)");
    $stmt->bind_param("ss", $_GET['afegir'], $_GET['clase']);
    $stmt->execute();
}

//Eliminar
if (!empty($_GET['eliminar'])) {
    $stmt = $db->prepare("DELETE FROM taulaweb WHERE descripcio = ?");
    $stmt->bind_param("s", $_GET['eliminar']);
    $stmt->execute();
}

foreach ($db->query("SELECT * FROM taulaweb") as $fila) {

    echo "<li> 
            <p class='${fila['prioritat']}'>
                ${fila['descripcio']}
                <a href='?eliminar=${fila['descripcio']}'>
                    <img src='img1.jpg'>
                </a>
            </p>    
        </li> ";
        
    
}

?>