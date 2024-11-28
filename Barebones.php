<?php 
$Country = $State ="";                          // creates a clean slate
$OptionsF= file_get_contents("Options.json");   // loads the file to be used (also used in the JS)
$Options = json_decode($OptionsF,true);         // makes it php usable 
// im using this style big echo style to not type "<? echo $Country; />" a bunch of times 
echo"               
    <select id=\"Country\" name=\"Country\" value=\"$Country\"placeholder=\"Country\" onchange=\"OptionsState(this,'State')\" class =\"\" maxlength = \"50\" autocomplete=\"address-level1\" required>
        <option value='".$Country."'>".$Country."</option>";
        foreach ($Options as $key => $Countrys) {
            echo $Countrys['Option'];
        }
        
        
        echo"    
    </select>
    <select id=\"State\" name=\"State\" value=\"$State\"placeholder=\"State\"  class =\"\" maxlength = \"50\" autocomplete=\"address-level1\" required>
    <option value='".$State."'>".$State."</option>";
        if($Country != ""){
        $cur = $Options[$Country]['States'];
            foreach ($cur as $key => $States) {
                echo $States;
            }
        }
        ?> 
    </select>
<script>
function OptionsState(CountrySelect,StateSelect){
    let Options = <?php echo $OptionsF;?>;
    let countryStates = Options[CountrySelect.value]['States'];

    let StateOptions = document.getElementById(StateSelect);
    StateOptions.innerHTML = "";
    for (const State in countryStates) {
        //console.log(countryStates[State]);
        StateOptions.innerHTML += countryStates[State];
    }
 
}
</script>