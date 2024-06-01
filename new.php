<?php include_once("head.php");
//if(isset($_GET['refresh'])){
//    //header("Location: https://phsite.tech/food/new.php");
//    die();
//}
if (isset($_POST['saveFishDisease'])) {
    $fish_disease_id = db_get_result('fish_disease', 'id', ["disease" => $_POST['type']]);
    $data = array("fish_disease_id" => $fish_disease_id, "imgFile" => $_POST['imgCode'], "acc_rate" => $_POST['val']);
    db_insert('fish_save_disease', $data);

    $message = "Information successfully saved.";
    echo "<script type='text/javascript'>alert('$message');'index.php?r=added';</script>";
}
?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/css/materialize.min.css">

<div class="container">
    <div class="row">
        <div class="col-12">
            <img width="60%" src="design/logo.png"/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3 tab-card">
                <div class="card-header tab-card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link show active" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="true">RESULT</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active  p-3" id="two" role="tabpanel" aria-labelledby="two-tab">

                        <div id="container">
                            <div id="webcam-container"></div>
                            <div id="label-container"></div>

                            <img id="selected-image" src="<?= $_SESSION['imgCode']; ?>" width="100%" height="224">
                            <!--                            <img id="selected-image" src="fish.jpg" width="224" height="224">-->
                            <!--                            TIME-->
                            <div id="status"></div>

                            <h1>
                                <?php
                                $_SESSION['imgCode'];
                                $cat = array("Diabetes", "Gouty Arthritis", "Peptic Ulcer");

                                $type = array("Meat", "Soda", "Sugar", "Sweet", "Beverage", "Seafoods", "Citrus Fruit", "Fatty Foods", "Spicy Food", "Tomatoes", "Red Meat");
                                $array = array(0 => $_COOKIE['1'], 1 => $_COOKIE['2'], 2 => $_COOKIE['3'],3 => $_COOKIE['4'], 4 => $_COOKIE['5'], 5 => $_COOKIE['6'], 6 => $_COOKIE['7']
                                , 7=> $_COOKIE['8'] , 8 => $_COOKIE['9'], 9 => $_COOKIE['10'], 10 => $_COOKIE['11']  );

                                
                                   if($maxValue<=0.70){
									  echo "<br/>NO DATA FOUND";
									  $h="hidden";
								  }else{
									   $h="";
								  }
								  
								  
                                 $maxIndex = array_search(max($array), $array); 
                                 $val = $_COOKIE[$maxIndex + 1];
                                   if($maxValue<=0.50){
                                   }else{
                                echo  $_SESSION['type'] = $type[$maxIndex];
                                }
                                
                                ?>
                            </h1>

                            <h2 id="prediction-result"></h2>

                            <center <?=$h;?> >
                                <?php
                                $i = 0;
                                $disease = $_SESSION['type'];
                                $result = my_query("SELECT  * FROM food_datasets fd INNER JOIN  food_diseases f ON f.id=fd.disease_id WHERE food_name='$disease'");
                                if ($row = $result->fetch()) { ?>

                                    <div class="container">
                                        <div class="row">

                                            <!--<h4 style="color: red" align="left"><b>   </b>-->
                                            <!--    <br/><?= $row['name']; ?></h4> <br/>-->

                                            <h5 style="color: <?=($_SESSION['cat_id']==$row['disease_id'] ? 'red' : 'green');  ?> " align="left">
                                              <b> 
                                                <?php if($_SESSION['cat_id']==$row['disease_id']){
                                                    echo "Food is not allowed." ;
                                                }else{
                                                    echo "Food is allowed.<br/><br/>";
                                                    
                                                    echo "Food is not allowed to this/these illness: <br/> <u style='color: red'>" . $row['name']."</u>";
                                                }?>
                                                   </b>
                                            </h5>

                                        </div>
                                    </div>

                                    <?php
                                } ?>
                            </center>
                            <div id="refreshMoto">
                                <br/>

                                <form action="" method="POST">
                                    <input type="hidden" name="type" value="<?= $_SESSION['type']; ?>"> <br/>
                                    <input type="hidden" name="val" value="<?= $val; ?>"> <br/>
                                    <input type="hidden" name="imgCode" value="<?= $_SESSION['imgCode']; ?>"> <br/>
<!--                                    <button type="submit" name="saveFishDisease" id="saveBtn" class="btn btn-info">Save</button>-->
                                    <a href="main.php" style="color: white"  id="cancelBtn" class="btn btn-warning">Back</a>
                                </form>

                            </div>


                            <div hidden>
                                <input type="file" id="image-selector" accept="image/*;capture=camera">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $("#refreshMoto").load("new.php #refreshMoto");
        }, 5000);
    });
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

<script>

    cancelBtn.addEventListener('click', stop);

    saveBtn.addEventListener('click', stop);

    function stop()
    {
        speechSynthesis.cancel();
    }

    $(function () {
        if ('speechSynthesis' in window) {
            speechSynthesis.onvoiceschanged = function () {
                var $voicelist = $('#voices');

                if ($voicelist.find('option').length == 0) {
                    speechSynthesis.getVoices().forEach(function (voice, index) {
                        var $option = $('<option>')
                            .val(index)
                            .html(voice.name + (voice.default ? ' (default)' : ''));

                        $voicelist.append($option);
                    });

                    $voicelist.material_select();
                }
            }


            $('#speak').click(function () {
                var text = $('#message').val();
                var msg = new SpeechSynthesisUtterance();
                var voices = window.speechSynthesis.getVoices();
                msg.voice = voices[$('#voices').val()];
                msg.rate = $('#rate').val() / 10;
                msg.pitch = $('#pitch').val();
                msg.text = text;

                msg.onend = function (e) {
                    console.log('Finished in ' + event.elapsedTime + ' seconds.');
                };

                speechSynthesis.speak(msg);
            })
        } else {
            $('#modal1').openModal();
        }
    });

</script>

</html>
