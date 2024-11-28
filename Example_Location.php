<html>
<head>
    <style>
        /* all pages */
        :root{
        --Base-color-BG: #ffffff;
        --Base-color-Txt: #000000;
        --Base-color-brdr: #000000;
        --Base-color-brdr-5: rgba(0, 0, 0, 0.5);
        --Base-color-Dbrdr:#cc9933; /*rgb(204, 153, 51); -main dark theme yellow*/
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #dee2e6;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.375rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 0.5rem;
        --bs-border-radius-xl: 1rem;
        



        }

        body{background-color: var(--Base-color-BG); color: var(--Base-color-txt); background-repeat: repeat-x; background-size: contain; background-attachment: fixed;  overflow-x: hidden; padding-top: 0; max-width: 100vw; max-height: 100%; min-width: 600px;}
        .hidden{display: none !important;}
        .red-text{color: red !important; display: inline; float: none;}
        .form-style {  display: block;  width: 100%;  padding: 0.375rem 0.75rem;  font-size: 1rem;  font-weight: 400;  line-height: 1.5;  color: var(--Base-color-Txt);  -webkit-appearance: none;  -moz-appearance: none;  appearance: none;  background-color: var(--Base-color-BG);  background-clip: padding-box;  border: var(--bs-border-width) solid var(--Base-color-brdr);  border-radius: var(--bs-border-radius);  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
        .form-style-button {  display: block;  width: 100%;  padding: 0.375rem 0.75rem;  font-size: 1rem;  font-weight: 400;  line-height: 1.5;  color: var(--Base-color-Txt);  -webkit-appearance: none;  -moz-appearance: none;  appearance: none;  background-color: var(--Base-color-BG);  background-clip: padding-box;  border: var(--bs-border-width) solid var(--Base-color-brdr);  border-radius: var(--bs-border-radius);  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; background-color: RGBA(100, 100, 100, 0.5); min-width: 75px;}
        .form-error{border-color: red; border-width: 2px;}
        .form-readonly{background-color: lightgray;}
        .form-dropdown{background-image: url("./images/Arrowdown.svg"); background-repeat: no-repeat;  background-position: right .75rem center;  background-size: 16px 12px;}
        .dropdown-toggle::after {  display: inline-block;  margin-left: .255em;  vertical-align: .255em;  content: "";  border-top: 0.5em solid;  border-bottom: 0;  border-left: 0.5em solid transparent;  border-right: 0.5em solid transparent;}
        /* Generic Layout */
        .T-Con{display: flex; width: 100%; flex-wrap: wrap;     flex-direction: column;}

        .T-Row{display: inline-flex; width: 100%; flex-wrap: wrap; justify-content: flex-start;}
        .T-Row-V{display: inline-flex; width: 100%; flex-wrap: wrap; justify-content: flex-start;flex-direction: column}
        .T-Row-R{display: inline-flex; width: 100%; flex-wrap: wrap; justify-content: flex-start; flex-direction: row-reverse;}

        .T-Cel{display:flex; width: fit-content; height: auto;}
        .T-Cel-V{display:flex; width: fit-content; height: auto; flex-direction: column; }
        /* Generic width */
        .t5{width: 5%;}.t10{width: 10%;}.t15{width: 15%;}.t20{width: 20%;}.t25{width: 25%;}.t30{width: 30%;} .t33{width: 33%;}.t40{width: 40%;}.t50{width: 50%;}
    </style>
</head>
<body>
<?php 
$Country =$State=  $City = $Address = $ercl10 =$ercl11="";
$error10 = $error11 = "hidden";
$OptionsF= file_get_contents("Options.json");
$Options = json_decode($OptionsF,true);
$LI=0;
$LL_Err11 = ["Can only contain letters, numbers and '. , - # ( )' .","Solo puede contener letras, numeros, '. , - # ( )' ."];$L_Err11 = $LL_Err11[$LI];

if(isset($_POST['RCsubmit'])){
    $Country =$_POST['Country'];$State = $_POST['State'];
    $City = $_POST['City'];
    $Address = $_POST['Adress'];
    if(preg_match(("/[!@$%^*<>]/"),$City)){
        $error = true;$error10 = "";$ercl10 = "form-error";
    }
    if(preg_match(("/[!@$%^*<>]/"),$Address)){
        $error = true;$error11 = "";$ercl11 = "form-error";
    }  
}

echo"



        <form method=\"post\" class=\"T-Row t50\" enctype=\"multipart/form-data\">
            <div class=\"T-Row\" id=\"location\">
                <div class=\"T-Cel t20\">
                    <label for=\"Country\">Country</label><span class=\"red-text\">*</span>   
                </div>
                <div class=\"T-Cel t30\">   
                    <select id=\"Country\" name=\"Country\" value=\"$Country\"placeholder=\"Country\" onchange=\"OptionsState(this,'State')\" class =\"form-style form-dropdown\" maxlength = \"50\" autocomplete=\"address-level1\" required>
                    <option value='".$Country."'>".$Country."</option>";
                    foreach ($Options as $key => $Countrys) {
                        echo $Countrys['Option'];
                    }
                    
                    ?>
                        
                    </select>
                    <?php  echo "
                </div>
                
                <div class=\"T-Cel t20\">
                    <label for=\"State\">State</label><span class=\"red-text\">*</span>   
                </div>
                <div class=\"T-Cel t30\">   
                    <select id=\"State\" name=\"State\" value=\"$State\"placeholder=\"State\"  class =\"form-style form-dropdown\" maxlength = \"50\" autocomplete=\"address-level1\" required>
                    <option value='".$State."'>".$State."</option>";
                    if($Country != ""){
                    $cur = $Options[$Country]['States'];
                    
                    foreach ($cur as $key => $States) {
                        echo $States;
                    }
                    }
                    ?>
                        
                    </select>
                    <?php  echo "
                </div>
            <div class=\"T-Row\" id=\"error\"><span class=\"$error10 red-text\" id=\"Err10\">$L_Err11</span></div>
            <div class=\"T-Row\" id=\"location\">
                <div class=\"T-Cel t20\">
                    <label for=\"City\">City:</label><span class=\"red-text\">*</span>
                </div>
                <div class=\"T-Cel t30\">
                    <input id=\"City\" type=\"text\" name=\"City\" value=\"$City\" placeholder=\"City\" class =\"form-style $ercl10\" maxlength = \"50\" autocomplete=\"address-level2\" required />
                </div>
            </div>
            <div class=\"T-Row\" id=\"error\"><span class=\"$error11 red-text\" id=\"Err11\">$L_Err11</span></div>
            <div class=\"T-Row\" id=\"street\">
                <div class=\"T-Cel t20\">
                    <label for=\"Adress\">Adress:</label>
                </div>
                <div class=\"T-Cel t80\">
                    <input id=\"Adress\" type=\"text\" name=\"Adress\" value=\"$Address\" placeholder=\"Adress\" class =\"form-style $ercl11\" maxlength = \"100\" autocomplete=\"street-address\" />
                </div>
            </div>
             <div class=\"T-Row\" id=\"submit\">
                <div class=\"T-Cel \">
                    
                    <input id=\"RCsubmit\" type=\"submit\" name=\"RCsubmit\" value=\"Register\" class =\"form-style-button\" />
                </div>
            </div>
         </form>";

         ?>
<script>
function OptionsState(CountrySelect,StateSelect){
 let Options = <?php echo $OptionsF;?>;
 let countryStates = Options[CountrySelect.value]['States'];

let StateOptions = document.getElementById(StateSelect);
StateOptions.innerHTML = "";
 for (const State in countryStates) {
    console.log(countryStates[State]);
    StateOptions.innerHTML += countryStates[State];
 }
 
}
</script>
<body>
</HTML>